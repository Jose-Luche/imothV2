<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InsuranceCompany;
use App\Models\PerformanceBond;
use App\Models\Travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index()
    {
        $list = Travel::paginate(25);
        return view('admin.travel.list',[
            'covers'=>$list
        ]);
    }
    //Create
    public function create()
    {
        $companies = InsuranceCompany::all();
        return view('admin.travel.create',[
            'companies'=>$companies
        ]);
    }
    //Submit
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'premium' => 'required',
            'limit' => 'required',
            'details' => 'string'
        ]);

        $create = Travel::create([
            'companyId'=>$request->input('company'),
            'premium'=>$request->input('premium'),
            'limit'=>$request->input('limit'),
            'details'=>$request->input('details'),
        ]);
        if (!$create)
        {
            return back()->with('error','An unexpected error occurred.Please reload and try again');
        }
        return back()->with('success','Travel Insurance submitted successfully.');
    }
    //Edit
    public function edit($id)
    {
        $details = Travel::findorfail($id);
        $companies = InsuranceCompany::all();
        return view('admin.travel.edit',[
            'details'=>$details,
            'companies'=>$companies
        ]);
    }
    //Details
    public function details($id)
    {
        $details = Travel::findorfail($id);
        return view('admin.travel.details',[
            'details'=>$details
        ]);
    }
    //Update
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'premium' => 'required',
            'limit' => 'required',
            'details' => 'string'
        ]);

        $create = Travel::where('id',$id)->update([
            'companyId'=>$request->input('company'),
            'premium'=>$request->input('premium'),
            'limit'=>$request->input('limit'),
            'details'=>$request->input('details'),
        ]);
        if (!$create)
        {
            return back()->with('error','An unexpected error occurred.Please reload and try again');
        }
        return back()->with('success','Travel Insurance Updated successfully.');
    }
    //Delete
    public function delete($id)
    {
        $details = Travel::findorfail($id);
        $details->delete();
        return redirect()->route('admin.travel')->with('success','Deleted successful.');
    }
}
