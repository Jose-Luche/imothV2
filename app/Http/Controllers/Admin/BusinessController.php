<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\InsuranceCompany;
use App\Models\Travel;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index()
    {
        $list = Business::paginate(25);
        return view('admin.business.list',[
            'covers'=>$list
        ]);
    }
    //Create
    public function create()
    {
        $companies = InsuranceCompany::all();
        return view('admin.business.create',[
            'companies'=>$companies
        ]);
    }
    //Submit
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'rate' => 'required',
            'minRate' => 'required',
            'details' => 'string'
        ]);

        $create = Business::create([
            'companyId'=>$request->input('company'),
            'rate'=>$request->input('rate'),
            'minRate'=>$request->input('minRate'),
            'details'=>$request->input('details'),
        ]);
        if (!$create)
        {
            return back()->with('error','An unexpected error occurred.Please reload and try again');
        }
        return back()->with('success','Business Insurance submitted successfully.');
    }
    //Edit
    public function edit($id)
    {
        $details = Business::findorfail($id);
        $companies = InsuranceCompany::all();
        return view('admin.business.edit',[
            'details'=>$details,
            'companies'=>$companies
        ]);
    }
    //Details
    public function details($id)
    {
        $details = Business::findorfail($id);
        return view('admin.business.details',[
            'details'=>$details
        ]);
    }
    //Update
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'rate' => 'required',
            'minRate' => 'required',
            'details' => 'string'
        ]);

        $create = Business::where('id',$id)->update([
            'companyId'=>$request->input('company'),
            'rate'=>$request->input('rate'),
            'minRate'=>$request->input('minRate'),
            'details'=>$request->input('details'),
        ]);
        if (!$create)
        {
            return back()->with('error','An unexpected error occurred.Please reload and try again');
        }
        return back()->with('success','Business Insurance Updated successfully.');
    }
    //Delete
    public function delete($id)
    {
        $details = Business::findorfail($id);
        $details->delete();
        return redirect()->route('admin.business')->with('success','Deleted successful.');
    }
}
