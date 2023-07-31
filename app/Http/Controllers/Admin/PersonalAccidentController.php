<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\AttachmentBenefit;
use App\Models\InsuranceCompany;
use App\Models\PersonalAccident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonalAccidentController extends Controller
{
    //Companies
    public function index()
    {
        $covers = PersonalAccident::paginate(20);
        return view('admin.personalAccident.list', [
            'covers' => $covers
        ]);
    }
    //Create
    public function create()
    {
        $companies = InsuranceCompany::all();
        return view('admin.personalAccident.create', [
            'companies' => $companies
        ]);
    }
    //SUBMIT
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'three_month' => 'required|numeric',
            'six_month' => 'required|numeric',
            'one_year' => 'required|numeric',
            'details' => 'string'
        ]);

        $createComprehensive = PersonalAccident::create([
            'companyId' => $request->input('company'),
            'category' => $request->input('category'),
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

        return back()->with('success', 'Insurance Created successfully.');
    }
    //Edit
    public function edit($id)
    {
        $details = PersonalAccident::findorfail($id);
        $companies = InsuranceCompany::all();
        return view('admin.personalAccident.edit', [
            'details' => $details,
            'companies' => $companies
        ]);
    }
    //Details
    public function details($id)
    {
        $details = PersonalAccident::findorfail($id);
        return view('admin.personalAccident.details', [
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

        $create = PersonalAccident::where('id', $id)->update([
            'three_month' => $request->input('three_month'),
            'six_month' => $request->input('six_month'),
            'one_year' => $request->input('one_year'),
            'details' => $request->input('details')

        ]);
        if (!$create) {
            return back()->withInput()->with('error', 'An unexpected error occurred.Please try again.');
        }
        return back()->with('success', 'Insurance Cover Updated successfully.');
    }
    //Delete companies
    public function delete($id)
    {
        $details = PersonalAccident::findorfail($id);
        $details->delete();
        return redirect()->route('admin.personalAccident')->with('success', 'Company deleted successfully.');
    }
}
