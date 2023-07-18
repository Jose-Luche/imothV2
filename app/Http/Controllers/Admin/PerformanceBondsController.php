<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InsuranceCompany;
use App\Models\PerformanceBond;
use Illuminate\Http\Request;

class PerformanceBondsController extends Controller
{
    public function index()
    {
        $list = PerformanceBond::paginate(25);
        return view('admin.performanceBonds.list',[
            'covers'=>$list
        ]);
    }
    //Create
    public function create()
    {
        $companies = InsuranceCompany::all();
        return view('admin.performanceBonds.create',[
            'companies'=>$companies
        ]);
    }
    //Submit
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'rate' => 'required',
            'details' => 'string'
        ]);

        $create = PerformanceBond::create([
            'companyId'=>$request->input('company'),
            'rate'=>$request->input('rate'),
            'details'=>$request->input('details'),
        ]);
        if (!$create)
        {
            return back()->with('error','An unexpected error occurred.Please reload and try again');
        }
        return back()->with('success','Bid bod submitted successfully.');
    }
    //Edit
    public function edit($id)
    {
        $details = PerformanceBond::findorfail($id);
        $companies = InsuranceCompany::all();
        return view('admin.performanceBonds.edit',[
            'details'=>$details,
            'companies'=>$companies
        ]);
    }
    //Details
    public function details($id)
    {
        $details = PerformanceBond::findorfail($id);
        return view('admin.performanceBonds.details',[
            'details'=>$details
        ]);
    }
    //Update
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'rate' => 'required',
            'details' => 'string'
        ]);

        $create = PerformanceBond::where('id',$id)->update([
            'companyId'=>$request->input('company'),
            'rate'=>$request->input('rate'),
            'details'=>$request->input('details'),
        ]);
        if (!$create)
        {
            return back()->with('error','An unexpected error occurred.Please reload and try again');
        }
        return back()->with('success','Bid bod Updated successfully.');
    }
    //Delete
    public function delete($id)
    {
        $details = PerformanceBond::findorfail($id);
        $details->delete();
        return redirect()->route('admin.performanceBonds')->with('success','Deleted successful.');
    }
}
