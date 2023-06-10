<?php

namespace App\Http\Controllers\Admin;

use App\Models\BidBond;
use App\Http\Controllers\Controller;
use App\Models\InsuranceCompany;
use Illuminate\Http\Request;

class BidBondsController extends Controller
{
    //
    public function index()
    {
        $list = BidBond::paginate(25);
        return view('admin.bidBonds.list',[
            'covers'=>$list
        ]);
    }
    //Create
    public function create()
    {
        $companies = InsuranceCompany::all();
        return view('admin.bidBonds.create',[
            'companies'=>$companies
        ]);
    }
    //Submit
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'rate' => 'required',
            'details' => 'string',
            'minRate'=>'required|numeric'
        ]);

        $create = BidBond::create([
            'companyId'=>$request->input('company'),
            'rate'=>$request->input('rate'),
            'minRate'=>$request->input('minRate'),
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
        $details = BidBond::findorfail($id);
        $companies = InsuranceCompany::all();
        return view('admin.bidBonds.edit',[
            'details'=>$details,
            'companies'=>$companies
        ]);
    }
    //Details
    public function details($id)
    {
        $details = BidBond::findorfail($id);
        return view('admin.bidBonds.details',[
            'details'=>$details
        ]);
    }
    //Update
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'rate' => 'required',
            'minRate'=>'required|numeric',
            'details' => 'string'
        ]);

        $create = BidBond::where('id',$id)->update([
            'companyId'=>$request->input('company'),
            'rate'=>$request->input('rate'),
            'minRate'=>$request->input('minRate'),
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
        $details = BidBond::findorfail($id);
        $details->delete();
        return redirect()->route('admin.bidBonds')->with('success','Deleted successful.');
    }
}
