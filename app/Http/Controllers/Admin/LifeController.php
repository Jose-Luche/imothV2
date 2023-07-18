<?php

namespace App\Http\Controllers\Admin;

use App\Models\BidBond;
use App\Http\Controllers\Controller;
use App\Models\InsuranceCompany;
use App\Models\Life;
use Illuminate\Http\Request;

class LifeController extends Controller
{
    public function index()
    {
        $list = Life::paginate(25);
        return view('admin.life.list',[
            'covers'=>$list
        ]);
    }
    //Create
    public function create()
    {
        $companies = InsuranceCompany::all();
        return view('admin.life.create',[
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
            
        ]);

        $create = Life::create([
            'companyId'=>$request->input('company'),
            'rate'=>$request->input('rate'),
            
            'details'=>$request->input('details'),
        ]);
        if (!$create)
        {
            return back()->with('error','An unexpected error occurred.Please reload and try again');
        }
        return back()->with('success','Life Insurance submitted successfully.');
    }
    //Edit
    public function edit($id)
    {
        $details = Life::findorfail($id);
        $companies = InsuranceCompany::all();
        return view('admin.life.edit',[
            'details'=>$details,
            'companies'=>$companies
        ]);
    }
    //Details
    public function details($id)
    {
        $details = Life::findorfail($id);
        return view('admin.life.details',[
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

        $create = Life::where('id',$id)->update([
            'companyId'=>$request->input('company'),
            'rate'=>$request->input('rate'),
            'minRate'=>$request->input('minRate'),
            'details'=>$request->input('details'),
        ]);
        if (!$create)
        {
            return back()->with('error','An unexpected error occurred.Please reload and try again');
        }
        return back()->with('success','Life Insurance Updated successfully.');
    }
    //Delete
    public function delete($id)
    {
        $details = Life::findorfail($id);
        $details->delete();
        return redirect()->route('admin.life')->with('success','Deleted successful.');
    }
}
