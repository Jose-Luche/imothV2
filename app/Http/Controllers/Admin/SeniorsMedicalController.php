<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InsuranceCompany;
use App\Models\SeniorsMedical;
use App\Models\SeniorsMedicalFamilyPremium;
use App\Models\SeniorsMedicalPrincipalPremium;
use App\Models\SeniorsMedicalSpousePremium;
use Illuminate\Http\Request;
use Validator;

class SeniorsMedicalController extends Controller
{
    public function index()
    {
        $list = SeniorsMedical::paginate(25);
        return view('admin.seniors.list',[
            'covers'=>$list
        ]);
    }
    //Create
    public function create()
    {
        $companies = InsuranceCompany::all();
        return view('admin.seniors.create',[
            'companies'=>$companies
        ]);
    }
    //Submit
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'company' => 'required|integer',
            'limit' => 'required',
            'limitType' => 'required',
            'pp_pf' => 'required',
            'details' => 'string',

        ]);

        $create = SeniorsMedical::create([
            'companyId' => $request->input('company'),
            'benefit_type' => $request->input('limitType'),
            'pp_pf' => $request->input('pp_pf'),
            'limit' => $request->input('limit'),
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
        $limits = SeniorsMedical::where('limit', ">", 0)->get();
        return view('admin.seniors.create_ip_premiums',[
            'limits'=>$limits,
            'companies'=>$companies
        ]);
    }
    /**See Available Limits for a Given Insurer**/
    public function viewLimits($id,$benefit,$pp_pf){
        $limits = SeniorsMedical::where('companyId', $id)->where('benefit_type', $benefit)->where('pp_pf', $pp_pf)->get();
        return view('admin.seniors.seniors-inpatient-limits', compact('limits'));
    }

    /**Create a FUnction that will be used to fetch any available premium rates for the specified Limit**/
    public function viewPremiums($id){
        $limit = SeniorsMedical::find($id);
        $principal = SeniorsMedicalPrincipalPremium::where('limitId', $id)->get();
        $spouse = SeniorsMedicalSpousePremium::where('limitId', $id)->get();
        $family = SeniorsMedicalFamilyPremium::where('limitId', $id)->get();

        return view('admin.seniors.available_premium_rates', compact('limit','principal', 'spouse', 'family'));
    }

    public function submitIpPremium(Request $request){
        $validatedData = $request->validate([
            'companyId' => 'required|integer',
            'limitId' => 'required|integer',

        ]);

        if($request->has('family_based')){
            $rules = [];
            if ($request->has('family_id')) {
                foreach ($request->input('family_id') as $key => $value) {
                    $rules["fm_age_from.{$key}"] = 'required';
                    $rules["fm_age_to.{$key}"] = 'required';
                }
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return back()->withInput()->with('error', 'Please ensure you fill all the required fields on Family Premiums .');
                }
            }

            $createFamily = [];
            /**Create Entry into both the Principal and Spouse Tables**/
            foreach ($request->input('fm_age_from') as $key => $value) {
                $ageFrom = $request['fm_age_from'][$key];
                $ageTo = $request['fm_age_to'][$key];
                $m = $request['m'][$key];
                $m_plus_one = $request['m_plus_one'][$key];
                $m_plus_two = $request['m_plus_two'][$key];
                $m_plus_three = $request['m_plus_three'][$key];
                $m_plus_four = $request['m_plus_four'][$key];
                $m_plus_five = $request['m_plus_five'][$key];


                if(isset($request['family_id'][$key]) && $request['family_id'][$key] != 0){
                    /**At this point, we update an Existing Entry**/
                    $createFamily = SeniorsMedicalFamilyPremium::where('id', $request['family_id'][$key])->update(
                        [
                            'limitId' => $request['limitId'],
                            'fm_age_from' => $ageFrom,
                            'fm_age_to' => $ageTo,
                            'm' => $m,
                            'm_plus_one' => $m_plus_one,
                            'm_plus_two' => $m_plus_two,
                            'm_plus_three' => $m_plus_three,
                            'm_plus_four' => $m_plus_four,
                            'm_plus_five' => $m_plus_five,
                        ]
                    );
                }else{
                    $createFamily = SeniorsMedicalFamilyPremium::create(
                        [
                            'limitId' => $request['limitId'],
                            'fm_age_from' => $ageFrom,
                            'fm_age_to' => $ageTo,
                            'm' => $m,
                            'm_plus_one' => $m_plus_one,
                            'm_plus_two' => $m_plus_two,
                            'm_plus_three' => $m_plus_three,
                            'm_plus_four' => $m_plus_four,
                            'm_plus_five' => $m_plus_five,
                        ]
                    );
                }
            }
            if (!$createFamily){
                return back()->with('error','An unexpected error occurred.Please reload and try again');
            }
        }else{
            //We store Per person Premiums -  Age Based
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

                if(isset($request['principalPremiumId'][$key]) && $request['principalPremiumId'][$key] != 0){
                    /**At this point, we update an Existing Entry**/
                    $createPrincipal = SeniorsMedicalPrincipalPremium::where('id',$request['principalPremiumId'][$key])->update(
                        [
                            'limitId' => $request['limitId'],
                            'age_from' => $ageFrom,
                            'age_to' => $ageTo,
                            'princ_premium' => $princPremium,
                            'child_premium' => $childPremium
                        ]
                    );
                }else{
                    $createPrincipal = SeniorsMedicalPrincipalPremium::create(
                        [
                            'limitId' => $request['limitId'],
                            'age_from' => $ageFrom,
                            'age_to' => $ageTo,
                            'princ_premium' => $princPremium,
                            'child_premium' => $childPremium
                        ]
                    );
                }
            }

            /**Create Entry into both the Principal and Spouse Tables**/
            foreach ($request->input('sp_premium') as $key => $value) {
                $ageFrom = $request['sp_age_from'][$key];
                $ageTo = $request['sp_age_to'][$key];
                $spPremium = $request['sp_premium'][$key];


                if(isset($request['spousePremiumId'][$key]) && $request['spousePremiumId'][$key] != 0){
                    /**At this point, we update an Existing Entry**/
                    $createSpouse = SeniorsMedicalSpousePremium::where('id', $request['spousePremiumId'][$key])->update(
                        [
                            'limitId' => $request['limitId'],
                            'sp_age_from' => $ageFrom,
                            'sp_age_to' => $ageTo,
                            'sp_premium' => $spPremium,
                        ]
                    );
                }else{
                    $createSpouse = SeniorsMedicalSpousePremium::create(
                        [
                            'limitId' => $request['limitId'],
                            'sp_age_from' => $ageFrom,
                            'sp_age_to' => $ageTo,
                            'sp_premium' => $spPremium,
                        ]
                    );
                }
            }
            if (!$createSpouse || !$createPrincipal){
                return back()->with('error','An unexpected error occurred.Please reload and try again');
            }
        }

        return back()->with('success','Premium Rates submitted successfully.');
    }

    //Edit
    public function edit($id)
    {
        $details = SeniorsMedical::findorfail($id);
        $companies = InsuranceCompany::all();
        return view('admin.seniors.edit',[
            'details'=>$details,
            'companies'=>$companies
        ]);
    }
    //Details
    public function details($id)
    {
        $details = SeniorsMedical::findorfail($id);
        return view('admin.seniors.details',[
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

        $create = SeniorsMedical::where('id',$id)->update([
            'companyId'=>$request->input('company'),
            'rate'=>$request->input('rate'),
            'details'=>$request->input('details'),
        ]);
        if (!$create)
        {
            return back()->with('error','An unexpected error occurred.Please reload and try again');
        }
        return back()->with('success','Seniors Medical Insurance Updated successfully.');
    }
    //Delete
    public function delete($id)
    {
        $details = SeniorsMedical::findorfail($id);
        $details->delete();
        return redirect()->route('admin.seniors')->with('success','Deleted successful.');
    }



    /**Create OP Limits**/
    public function createOp()
    {
        $companies = InsuranceCompany::all();
        return view('admin.seniors.create-op',[
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

        $create = SeniorsMedical::create([
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
