<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InsuranceCompany;
use App\Models\QuotationClause;
use Illuminate\Http\Request;

class ClausesController extends Controller
{
   //Motor Limits - View available Limits per insurer and per class
    public function motorLimits()
    {
        $limits = QuotationClause::where('category', 'motor')->paginate(20);
        return view('admin.limits.motor.list',[
            'limits'=>$limits
        ]);
    }

    //View Details for a Particular Motor Limit
    public function viewMotorLimits($id){
        $clause = QuotationClause::find($id);
        return view('admin.limits.motor.details',[
            'clause' => $clause,
            'id' => $id
        ]);
    }
    //Create a New Motor Limit
    public function createMotorLimits(){
        $companies = InsuranceCompany::all();
        return view('admin.limits.motor.create',[
            'companies'=>$companies
        ]);
    }

    //Submit a New Motor Limit Clause Created
    public function submitMotorLimits(Request $request){
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'product' => 'required',
            'class' => 'required',
            'clauses' => 'string'
        ]);

        if(QuotationClause::where('compId', $request['company'])
            ->where('category', 'motor')
            ->where('product', $request['product'])
            ->where('class', $request['class'])->first()
        ){
            return back()->withInput()->with('error','Clauses already exist, please update them instead of creating them again');
        }

        $createNewClauses = QuotationClause::create([
            'category'=>'motor',
            'compId'=>$request->input('company'),
            'product'=>$request->input('product'),
            'class'=>$request->input('class'),
            'clauses'=>$request->input('clauses'),
        ]);
        if (!$createNewClauses)
        {
            return back()->withInput()->with('error','An unexpected error occurred.Please try again.');
        }
        return back()->with('success','Clauses Created successfully.');
    }

    //Show Edit Motor Clauses
    public function editMotorLimits($id){
        $clause = QuotationClause::find($id);
        $companies = InsuranceCompany::all();
        return view('admin.limits.motor.edit',[
            'companies'=>$companies,
            'clause' => $clause,
            'id' => $id
        ]);
    }
    //Update Edited Clauses
    public function storeEditMotorLimits($id, Request $request){
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'product' => 'required',
            'class' => 'required',
            'clauses' => 'string'
        ]);

        if(QuotationClause::where('id', '!=', $id)->where('compId', $request['company'])
            ->where('category', 'motor')
            ->where('product', $request['product'])
            ->where('class', $request['class'])->first()
        ){
            return back()->withInput()->with('error','Clauses already exist, please update them instead of creating them again');
        }

        $createNewClauses = QuotationClause::where('id', $id)->update([
            'category'=>'motor',
            'compId'=>$request->input('company'),
            'product'=>$request->input('product'),
            'class'=>$request->input('class'),
            'clauses'=>$request->input('clauses'),
        ]);
        if (!$createNewClauses)
        {
            return back()->withInput()->with('error','An unexpected error occurred.Please try again.');
        }
        return back()->with('success','Clauses Updated successfully.');
    }

    //Delete Motor Clauses Item
    public function deleteMotorLimits($id)
    {
        $details = QuotationClause::findorfail($id);
        $details->delete();
        return back()->with('success','Clause Item Deleted successfully.');
    }


    //Non Motor Section
    //View available Limits per insurer and per class
    public function nonMotorLimits()
    {
        $limits = QuotationClause::where('category', 'nonmotor')->paginate(20);
        return view('admin.limits.nonmotor.list',[
            'limits'=>$limits
        ]);
    }

    //View Details for a Particular Motor Limit
    public function viewNonMotorLimits($id){
        $clause = QuotationClause::find($id);
        return view('admin.limits.nonmotor.details',[
            'clause' => $clause,
            'id' => $id
        ]);
    }
    //Create a New Motor Limit
    public function createNonMotorLimits(){
        $companies = InsuranceCompany::all();
        return view('admin.limits.nonmotor.create',[
            'companies'=>$companies
        ]);
    }

    //Submit a New Motor Limit Clause Created
    public function submitNonMotorLimits(Request $request){
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'product' => 'required',
            'class' => 'required',
            'clauses' => 'string'
        ]);

        if(QuotationClause::where('compId', $request['company'])
            ->where('category', 'nonmotor')
            ->where('product', $request['product'])
            ->where('class', $request['class'])->first()
        ){
            return back()->withInput()->with('error','Clauses already exist, please update them instead of creating them again');
        }

        $createNewClauses = QuotationClause::create([
            'category'=>'nonmotor',
            'compId'=>$request->input('company'),
            'product'=>$request->input('product'),
            'class'=>$request->input('class'),
            'clauses'=>$request->input('clauses'),
        ]);
        if (!$createNewClauses)
        {
            return back()->withInput()->with('error','An unexpected error occurred.Please try again.');
        }
        return back()->with('success','Clauses Created successfully.');
    }

    //Show Edit Motor Clauses
    public function editNonMotorLimits($id){
        $clause = QuotationClause::find($id);
        $companies = InsuranceCompany::all();
        return view('admin.limits.nonmotor.edit',[
            'companies'=>$companies,
            'clause' => $clause,
            'id' => $id
        ]);
    }
    //Update Edited Clauses
    public function storeEditNonMotorLimits($id, Request $request){
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'product' => 'required',
            'class' => 'required',
            'clauses' => 'string'
        ]);

        if(QuotationClause::where('id', '!=', $id)->where('compId', $request['company'])
            ->where('category', 'nonmotor')
            ->where('product', $request['product'])
            ->where('class', $request['class'])->first()
        ){
            return back()->withInput()->with('error','Clauses already exist, please update them instead of creating them again');
        }

        $createNewClauses = QuotationClause::where('id', $id)->update([
            'category'=>'nonmotor',
            'compId'=>$request->input('company'),
            'product'=>$request->input('product'),
            'class'=>$request->input('class'),
            'clauses'=>$request->input('clauses'),
        ]);
        if (!$createNewClauses)
        {
            return back()->withInput()->with('error','An unexpected error occurred.Please try again.');
        }
        return back()->with('success','Clauses Updated successfully.');
    }

    //Delete Motor Clauses Item
    public function deleteNonMotorLimits($id)
    {
        $details = QuotationClause::findorfail($id);
        $details->delete();
        return back()->with('success','Clause Item Deleted successfully.');
    }
}
