<?php

namespace App\Http\Controllers\Admin;

use AfricasTalking\SDK\AfricasTalking;
use App\Models\Comprehensive;
use App\Models\ComprehensiveBenefit;
use App\Http\Controllers\Controller;
use App\Models\InsuranceCompany;
use Illuminate\Http\Request;
use Validator;

class ComprehensiveController extends Controller
{
    //Companies
    public function index()
    {
        $covers = Comprehensive::paginate(20);
        return view('admin.comprehensive.list',[
            'covers'=>$covers
        ]);
    }
    //Create
    public function create()
    {
        $companies = InsuranceCompany::all();
        return view('admin.comprehensive.create',[
            'companies'=>$companies
        ]);
    }
    //SUBMIT
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'rate' => 'required|numeric',
            'category' => 'required',
            'minRate' => 'required',
            'minYear' => 'required|size:4',
            'details' => 'string'
        ]);


        $rules = [];
        if ($request->has('benefitName')) {
            foreach ($request->input('benefitName') as $key => $value) {
                $rules["benefitName.{$key}"] = 'required';
                $rules["benefitRate.{$key}"] = 'required|numeric';
                $rules["benefitRateType.{$key}"] = 'required|numeric';
            }
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->withInput()->with('error', 'Please ensure you fill all the required fields on benefits.');
            }
        }
//        dd($request->has('benefitName'));

        $createComprehensive = Comprehensive::create([
            'companyId'=>$request->input('company'),
            'category'=>$request->input('category'),
            'rate'=>$request->input('rate'),
            'details'=>$request->input('details'),
            'minRate'=>$request->input('minRate'),
            'minYear'=>$request->input('minYear'),
        ]);
        if (!$createComprehensive)
        {
            return back()->withInput()->with('error','An unexpected error occurred.Please try again.');
        }
        if ($request->has('benefitName')) {
            foreach ($request->input('benefitName') as $key => $value) {
                $isExcess = $request->input('benefitRateType')[$key] == 2 ? true:false;
                if ($isExcess) {
                    $create = ComprehensiveBenefit::create([
                        'compId'   => $createComprehensive->id,
                        'name'     => $request->input('benefitName')[$key],
                        'price'    => $request->input('benefitMinimum')[$key],
                        'rate'     => $request->input('benefitRate')[$key],
                        'type'     => $request->input('benefitRateType')[$key],
                        'isExcess' => $isExcess
                    ]);
                }else{
                    $create = ComprehensiveBenefit::create([
                        'compId'   => $createComprehensive->id,
                        'name'     => $request->input('benefitName')[$key],
                        'price'    => $request->input('benefitMinimum')[$key],
                        'rate'     => $request->input('benefitRate')[$key],
                        'type'     => $request->input('benefitRateType')[$key],
                        'isExcess' => $isExcess
                    ]);
                }
            }
        }
        return back()->with('success','Insurance Created successfully.');

    }
    //Edit
    public function edit($id)
    {
        $details = Comprehensive::findorfail($id);
        $companies = InsuranceCompany::all();
        return view('admin.comprehensive.edit',[
            'details'=>$details,
            'companies'=>$companies
        ]);
    }
    //Details
    public function details($id)
    {
        $details = Comprehensive::findorfail($id);
        return view('admin.comprehensive.details',[
            'details'=>$details
        ]);
    }
    //Update
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'category' => 'required',
            'rate' => 'required',
            'minRate' => 'required',
            'minYear' => 'required|size:4',
            'details' => 'string'
        ]);

        $rules = [];
        if ($request->has('benefitName')) {
            foreach ($request->input('benefitName') as $key => $value) {
                $rules["benefitName.{$key}"] = 'required';
                $rules["benefitRate.{$key}"] = 'required|numeric';
                $rules["benefitRateType.{$key}"] = 'required|numeric';

            }
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->withInput()->with('error', 'Please ensure you fill all the required fields on benefits.');
            }
        }
//        dd($request->has('benefitName'));

        $create = Comprehensive::where('id',$id)->update([
            'rate'=>$request->input('rate'),
            'category'=>$request->input('category'),
            'details'=>$request->input('details'),
            'minRate'=>$request->input('minRate'),
            'minYear'=>$request->input('minYear'),
        ]);
        if (!$create)
        {
            return back()->withInput()->with('error','An unexpected error occurred.Please try again.');
        }
        if ($request->has('benefitName')) {
            foreach ($request->input('benefitName') as $key => $value) {
                if ($request->input('type')[$key] == 0) {
                    $create = ComprehensiveBenefit::create([
                        'compId' => $id,
                        'name' => $request->input('benefitName')[$key],
                        'price'=>$request->input('benefitMinimum')[$key],
                        'rate' => $request->input('benefitRate')[$key],
                        'type' => $request->input('benefitRateType')[$key]
                    ]);
                }else{
                    $create = ComprehensiveBenefit::where('id',$request->input('bId')[$key])->update([
                        'name' => $request->input('benefitName')[$key],
                        'price'=>$request->input('benefitMinimum')[$key],
                        'rate' => $request->input('benefitRate')[$key],
                        'type' => $request->input('benefitRateType')[$key]
                    ]);
                }
            }
        }
        return back()->with('success','Insurance Cover Updated successfully.');
    }
    //Delete companies
    public function delete($id)
    {
        $details = Comprehensive::findorfail($id);
        $details->delete();
        return redirect()->route('admin.comprehensive')->with('success','Company deleted successfully.');
    }
    public function deleteBenefit($id)
    {
        $details = ComprehensiveBenefit::findorfail($id);
        $details->delete();
        return back()->with('success','Benefit deleted successfully.');
    }
}
