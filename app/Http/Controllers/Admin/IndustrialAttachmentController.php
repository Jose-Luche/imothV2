<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attachment;
use App\Models\AttachmentBenefit;
use App\Http\Controllers\Controller;
use App\Models\InsuranceCompany;
use App\Models\ThirdParty;
use App\Models\ThirdPartyBenefit;
use Illuminate\Http\Request;
use Validator;

class IndustrialAttachmentController extends Controller
{
    //Companies
    public function index()
    {
        $covers = Attachment::paginate(20);
        return view('admin.attachment.list', [
            'covers' => $covers
        ]);
    }
    //Create
    public function create()
    {
        $companies = InsuranceCompany::all();
        return view('admin.attachment.create', [
            'companies' => $companies
        ]);
    }
    //SUBMIT
    public function submit(Request $request)
    {
        $messages = [
            'rate.required' => 'The standard fee is required.'
        ];
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'three_month' => 'required|numeric',
            'six_month' => 'required|numeric',
            'one_year' => 'required|numeric',
            'details' => 'string'
        ], $messages);

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

        $createComprehensive = Attachment::create([
            'companyId' => $request->input('company'),
            'three_month' => $request->input('three_month'),
            'six_month' => $request->input('six_month'),
            'one_year' => $request->input('one_year'),
            'details' => $request->input('details'),
            'rate' => 0,
            'minRate' => 0,
        ]);
        if (!$createComprehensive) {
            return back()->withInput()->with('error', 'An unexpected error occurred.Please try again.');
        }
        if ($request->has('benefitName')) {
            foreach ($request->input('benefitName') as $key => $value) {
                $create = AttachmentBenefit::create([
                    'partyId' => $createComprehensive->id,
                    'name' => $request->input('benefitName')[$key],
                    'price' => 0,
                    'rate' => $request->input('benefitRate')[$key],
                    'type' => $request->input('benefitRateType')[$key]
                ]);
            }
        }
        return back()->with('success', 'Insurance Created successfully.');
    }
    //Edit
    public function edit($id)
    {
        $details = Attachment::findorfail($id);
        $companies = InsuranceCompany::all();
        return view('admin.attachment.edit', [
            'details' => $details,
            'companies' => $companies
        ]);
    }
    //Details
    public function details($id)
    {
        $details = Attachment::findorfail($id);
        return view('admin.attachment.details', [
            'details' => $details
        ]);
    }
    //Update
    public function update(Request $request, $id)
    {
        $messages = [
            'rate.required' => 'The standard fee is required.'
        ];
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'three_month' => 'required|numeric',
            'six_month' => 'required|numeric',
            'one_year' => 'required|numeric',
            'details' => 'nullable|string'
        ], $messages);

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

        $create = Attachment::where('id', $id)->update([
            'three_month' => $request->input('three_month'),
            'six_month' => $request->input('six_month'),
            'one_year' => $request->input('one_year'),
            'details' => $request->input('details')

        ]);
        if (!$create) {
            return back()->withInput()->with('error', 'An unexpected error occurred.Please try again.');
        }
        if ($request->has('benefitName')) {
            foreach ($request->input('benefitName') as $key => $value) {
                if ($request->input('type')[$key] == 0) {
                    $create = AttachmentBenefit::create([
                        'partyId' => $id,
                        'name' => $request->input('benefitName')[$key],
                        'price' => 0,
                        'rate' => $request->input('benefitRate')[$key],
                        'type' => $request->input('benefitRateType')[$key]
                    ]);
                } else {
                    $create = AttachmentBenefit::where('id', $request->input('bId')[$key])->update([
                        'name' => $request->input('benefitName')[$key],
                        'price' => 0,
                        'rate' => $request->input('benefitRate')[$key],
                        'type' => $request->input('benefitRateType')[$key]
                    ]);
                }
            }
        }
        return back()->with('success', 'Insurance Cover Updated successfully.');
    }
    //Delete companies
    public function delete($id)
    {
        $details = Attachment::findorfail($id);
        $details->delete();
        return redirect()->route('admin.attachment')->with('success', 'Company deleted successfully.');
    }
    public function deleteBenefit($id)
    {
        $details = AttachmentBenefit::findorfail($id);
        $details->delete();
        return back()->with('success', 'Benefit deleted successfully.');
    }
}
