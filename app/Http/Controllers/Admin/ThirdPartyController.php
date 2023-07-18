<?php

namespace App\Http\Controllers\Admin;

use App\Models\ComprehensiveBenefit;
use App\Http\Controllers\Controller;
use App\Models\InsuranceCompany;
use App\Models\ThirdParty;
use App\Models\ThirdPartyBenefit;
use Illuminate\Http\Request;
use Validator;

class ThirdPartyController extends Controller
{
    //Companies
    public function index()
    {
        $covers = ThirdParty::paginate(20);
        return view('admin.thirdParty.list',[
            'covers'=>$covers
        ]);
    }
    //Create
    public function create()
    {
        $companies = InsuranceCompany::all();
        return view('admin.thirdParty.create',[
            'companies'=>$companies
        ]);
    }
    //SUBMIT
    public function submit(Request $request)
    {

        $messages = [
            'rate.required'=>'The standard fee is required.'
        ];
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'rate' => 'required|numeric',
            'category' => 'required|string',
            'type'=>'required|in:Annually,Monthly',
            'details' => 'string'
        ],$messages);



        $createComprehensive = ThirdParty::create([
            'companyId'=> $request->input('company'),
            'category' => $request->input('category'),
            'rate'=> $request->input('rate'),
            'type'=> $request->type,
            'details'=> $request->input('details'),
            'minRate'=> 0,
            'minYear'=> 2000,
        ]);
        if (!$createComprehensive)
        {
            return back()->withInput()->with('error','An unexpected error occurred.Please try again.');
        }
        return back()->with('success','Insurance Created successfully.');

    }
    //Edit
    public function edit($id)
    {
        $details = ThirdParty::findorfail($id);
        $companies = InsuranceCompany::all();
        return view('admin.thirdParty.edit',[
            'details'=>$details,
            'companies'=>$companies
        ]);
    }
    //Details
    public function details($id)
    {
        $details = ThirdParty::findorfail($id);
        return view('admin.thirdParty.details',[
            'details'=>$details
        ]);
    }
    //Update
    public function update(Request $request,$id)
    {
        $messages = [
            'rate.required'=>'The standard fee is required.'
        ];
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'rate' => 'required',
            'type'=>'required|in:Annually,Monthly',
            'details' => 'string'
        ],$messages);

        $create = ThirdParty::where('id',$id)->update([
            'companyId'=>$request->input('company'),
            'rate'=>$request->input('rate'),
            'details'=>$request->input('details'),
            'type'=>$request->input('type'),
        ]);
        if (!$create)
        {
            return back()->withInput()->with('error','An unexpected error occurred.Please try again.');
        }
        return back()->with('success','Insurance Cover Updated successfully.');
    }
    //Delete companies
    public function delete($id)
    {
        $details = ThirdParty::findorfail($id);
        $details->delete();
        return redirect()->route('admin.thirdParty')->with('success','Company deleted successfully.');
    }
    public function deleteBenefit($id)
    {
        $details = ThirdPartyBenefit::findorfail($id);
        $details->delete();
        return back()->with('success','Benefit deleted successfully.');
    }
}
