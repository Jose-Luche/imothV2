<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InsuranceCompany;
use App\Models\LastExpense;
use Illuminate\Http\Request;

class LastExpenseController extends Controller
{
    //Companies
    public function index()
    {
        $covers = LastExpense::paginate(20);
        return view('admin.lastExpense.list', [
            'covers' => $covers
        ]);
    }
    //Create
    public function create()
    {
        $companies = InsuranceCompany::all();
        return view('admin.lastExpense.create', [
            'companies' => $companies
        ]);
    }
    //SUBMIT
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'limit' => 'required|numeric',
            'spouseLimit' => 'required|numeric',
            'childLimit' => 'required|numeric',
            'parentLimit' => 'required|numeric',
            'max_children' => 'required|numeric',
            'extra_premium' => 'required|numeric',
            'premium' => 'required|numeric',
            'details' => 'string'
        ]);

        $createComprehensive = LastExpense::create([
            'companyId' => $request->input('company'),
            'limit' => $request->input('limit'),
            'spouse_limit' => $request->input('spouseLimit'),
            'child_limit' => $request->input('childLimit'),
            'parent_limit' => $request->input('parentLimit'),
            'premium' => $request->input('premium'),
            'max_child_limit' => $request->input('max_children'),
            'additional_child_premium' => $request->input('extra_premium'),
            'details' => $request->input('details'),
        ]);
        if (!$createComprehensive) {
            return back()->withInput()->with('error', 'An unexpected error occurred.Please try again.');
        }

        return back()->with('success', 'Insurance Cover Created successfully.');
    }
    //Edit
    public function edit($id)
    {
        $details = LastExpense::findorfail($id);
        $companies = InsuranceCompany::all();
        return view('admin.lastExpense.edit', [
            'details' => $details,
            'companies' => $companies
        ]);
    }
    //Details
    public function details($id)
    {
        $details = LastExpense::findorfail($id);
        return view('admin.lastExpense.details', [
            'details' => $details
        ]);
    }
    //Update
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'company' => 'required|integer',
            'limit' => 'required|numeric',
            'spouseLimit' => 'required|numeric',
            'childLimit' => 'required|numeric',
            'parentLimit' => 'required|numeric',
            'premium' => 'required|numeric',
            'max_children' => 'required|numeric',
            'extra_premium' => 'required|numeric',
            'details' => 'nullable|string'
        ]);

        $create = LastExpense::where('id', $id)->update([
            'limit' => $request->input('limit'),
            'spouse_limit' => $request->input('spouseLimit'),
            'child_limit' => $request->input('childLimit'),
            'parent_limit' => $request->input('parentLimit'),
            'premium' => $request->input('premium'),
            'max_child_limit' => $request->input('max_children'),
            'additional_child_premium' => $request->input('extra_premium'),
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
        $details = LastExpense::findorfail($id);
        $details->delete();
        return redirect()->route('admin.lastExpense')->with('success', 'Company deleted successfully.');
    }
}
