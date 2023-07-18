<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\InsuranceCompany;
use App\Models\Travel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $list = Home::paginate(25);
        return view('admin.home.list',[
            'covers'=>$list
        ]);
    }
    //Create
    public function create()
    {
        $companies = InsuranceCompany::all();
        return view('admin.home.create',[
            'companies'=>$companies
        ]);
    }
    //Submit
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'rate' => 'required',
            'category' => 'required',
            'minRate' => 'required',
            'details' => 'string'
        ]);

        $create = Home::create([
            'companyId'=>$request->input('company'),
            'rate'=>$request->input('rate'),
            'category'=>$request->input('category'),
            'minRate'=>$request->input('minRate'),
            'details'=>$request->input('details'),
        ]);
        if (!$create)
        {
            return back()->with('error','An unexpected error occurred.Please reload and try again');
        }
        return back()->with('success','Home Insurance submitted successfully.');
    }
    //Edit
    public function edit($id)
    {
        $details = Home::findorfail($id);
        $companies = InsuranceCompany::all();
        return view('admin.home.edit',[
            'details'=>$details,
            'companies'=>$companies
        ]);
    }
    //Details
    public function details($id)
    {
        $details = Home::findorfail($id);
        return view('admin.home.details',[
            'details'=>$details
        ]);
    }
    //Update
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'rate' => 'required',
            'category' => 'required',
            'minRate' => 'required',
            'details' => 'string'
        ]);

        $create = Home::where('id',$id)->update([
            'companyId'=>$request->input('company'),
            'rate'=>$request->input('rate'),
            'minRate'=>$request->input('minRate'),
            'details'=>$request->input('details'),
            'category'=>$request->input('category'),
        ]);
        if (!$create)
        {
            return back()->with('error','An unexpected error occurred.Please reload and try again');
        }
        return back()->with('success','Home Insurance Updated successfully.');
    }
    //Delete
    public function delete($id)
    {
        $details = Home::findorfail($id);
        $details->delete();
        return redirect()->route('admin.home')->with('success','Deleted successful.');
    }
}
