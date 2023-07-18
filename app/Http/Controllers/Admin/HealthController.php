<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\HealthPrincipalPremium;
use App\Models\HealthSpousePremium;
use App\Models\InsuranceCompany;
use App\Models\Health;
use Illuminate\Http\Request;
use Validator;

class HealthController extends Controller
{
    public function index()
    {
        $list = Health::paginate(25);
        return view('admin.health.list',[
            'covers'=>$list
        ]);
    }
    //Create
    public function create()
    {
        $companies = InsuranceCompany::all();
        return view('admin.health.create',[
            'companies'=>$companies
        ]);
    }
    //Submit
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'limit' => 'required',
            'details' => 'string',

        ]);

        $create = Health::create([
            'companyId'=>$request->input('company'),
            'limit'=>$request->input('limit'),

            'details'=>$request->input('details'),
        ]);
        if (!$create)
        {
            return back()->with('error','An unexpected error occurred.Please reload and try again');
        }
        return back()->with('success','Inpatient Limit submitted successfully.');
    }

    /**Show and Create new Premium Rates for IP Limits**/
    public function createIpPremium(){
        $companies = InsuranceCompany::all();
        $limits = Health::where('limit', ">", 0)->get();
        return view('admin.health.create_ip_premiums',[
            'limits'=>$limits,
            'companies'=>$companies
        ]);
    }
    /**See Available Limits for a Given Insurer**/
    public function viewLimits($id){
        $limits = Health::where('companyId', $id)->get();
        return view('admin.health.health-inpatient-limits', compact('limits'));
    }
    public function submitIpPremium(Request $request){
        $validatedData = $request->validate([
            'companyId' => 'required|integer',
            'limitId' => 'required|integer',

        ]);

        $rules = [];
        if ($request->has('princ_premium')) {
            foreach ($request->input('princ_premium') as $key => $value) {
                $rules["age_from.{$key}"] = 'required';
                $rules["age_to.{$key}"] = 'required';
                $rules["princ_premium.{$key}"] = 'required';
                $rules["child_premium.{$key}"] = 'required';
            }
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->withInput()->with('error', 'Please ensure you fill all the required fields on Principal Inpatient Premiums .');
            }
        }

        $rules = [];
        if ($request->has('sp_premium')) {
            foreach ($request->input('sp_premium') as $key => $value) {
                $rules["sp_age_from.{$key}"] = 'required';
                $rules["sp_age_to.{$key}"] = 'required';
                $rules["sp_premium.{$key}"] = 'required';
            }
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->withInput()->with('error', 'Please ensure you fill all the required fields on Spouse Inpatient Premiums .');
            }
        }
        $createSpouse = $createPrincipal = [];
        /**Create Entry into both the Principal and Spouse Tables**/
        foreach ($request->input('princ_premium') as $key => $value) {
            $ageFrom = $request['age_from'][$key];
            $ageTo = $request['age_to'][$key];
            $princPremium = $request['princ_premium'][$key];
            $childPremium = $request['child_premium'][$key];

            $createPrincipal = HealthPrincipalPremium::create(
                [
                    'limitId' => $request['limitId'],
                    'age_from' => $ageFrom,
                    'age_to' => $ageTo,
                    'princ_premium' => $princPremium,
                    'child_premium' => $childPremium
                ]
            );
        }

        /**Create Entry into both the Principal and Spouse Tables**/
        foreach ($request->input('sp_premium') as $key => $value) {
            $ageFrom = $request['sp_age_from'][$key];
            $ageTo = $request['sp_age_to'][$key];
            $spPremium = $request['sp_premium'][$key];

            $createSpouse = HealthSpousePremium::create(
                [
                    'limitId' => $request['limitId'],
                    'sp_age_from' => $ageFrom,
                    'sp_age_to' => $ageTo,
                    'sp_premium' => $spPremium,
                ]
            );
        }


        if (!$createSpouse || !$createPrincipal){
            return back()->with('error','An unexpected error occurred.Please reload and try again');
        }
        return back()->with('success','Premium Rates submitted successfully.');
    }

    //Edit
    public function edit($id)
    {
        $details = Health::findorfail($id);
        $companies = InsuranceCompany::all();
        return view('admin.health.edit',[
            'details'=>$details,
            'companies'=>$companies
        ]);
    }
    //Details
    public function details($id)
    {
        $details = Health::findorfail($id);
        return view('admin.health.details',[
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

        $create = Health::where('id',$id)->update([
            'companyId'=>$request->input('company'),
            'rate'=>$request->input('rate'),
            'details'=>$request->input('details'),
        ]);
        if (!$create)
        {
            return back()->with('error','An unexpected error occurred.Please reload and try again');
        }
        return back()->with('success','Health Insurance Updated successfully.');
    }
    //Delete
    public function delete($id)
    {
        $details = Health::findorfail($id);
        $details->delete();
        return redirect()->route('admin.health')->with('success','Deleted successful.');
    }



    /**Create OP Limits**/
    public function createOp()
    {
        $companies = InsuranceCompany::all();
        return view('admin.health.create-op',[
            'companies'=>$companies
        ]);
    }

    public function submitOp(Request $request)
    {
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'limit' => 'required',
            'details' => 'string',

        ]);

        $create = Health::create([
            'companyId'=>$request->input('company'),
            'limit'=>$request->input('limit'),

            'details'=>$request->input('details'),
        ]);
        if (!$create)
        {
            return back()->with('error','An unexpected error occurred.Please reload and try again');
        }
        return back()->with('success','Inpatient Limit submitted successfully.');
    }
}
