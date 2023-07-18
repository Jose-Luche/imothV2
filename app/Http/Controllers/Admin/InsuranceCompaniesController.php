<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InsuranceCompany;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;

class InsuranceCompaniesController extends Controller
{
    //Companies
    public function companies()
    {
        $companies = InsuranceCompany::paginate(20);
        return view('admin.companies.list',[
            'companies'=>$companies
        ]);
    }
    //Create
    public function create()
    {
        return view('admin.companies.create');
    }
    //SUBMIT
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'location' => 'required',
            'details' => 'string',
            'logo'=>'required|mimes:jpeg,jpg,png,bmb,gif,svg',
        ]);

        /*$createCompany = InsuranceCompany::create([
            'name'=>$request->input('name'),
            'location'=>$request->input('location'),
            'details'=>$request->input('details'),
            'logo'=> 'x',
        ]);*/

        $company = new InsuranceCompany;
        $company->name = $request->name;
        $company->location = $request->location;
        $company->details = $request->details;
        $company->logo = $request->logo;

        if ($request->file('logo')) {
            $file = $request->file('logo');
            //@unlink(public_path('upload/user_image/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/company'), $filename);
            $company['logo'] = $filename;
        }

        $company->save();
        /*if (!$createCompany)
        {
            return back()->withInput()->with('error','An unexpected error occurred.Please try again.');
        }
        if ($request->hasFile('image'))
        {
            //Upload the damn image
            $filenamewithextension = $request->file('image')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('image')->getClientOriginalExtension();

            //filename to store
            $filenametostore = 'blog/'.time().'.'.$extension;

            //Upload File to s3
            $storeImage = Storage::disk('public')->put($filenametostore, fopen($request->file('image'), 'r+'), 'public');

            $fileUrl = $filenametostore;
            if ($storeImage)
            {
                $storePath = InsuranceCompany::where('id',$createCompany->id)
                    ->update([
                        'logo'=>$fileUrl,
                    ]);
                return back()->with('success','Insurance Company Created successfully.');
            }

            return back()->withInput()->with('errors','An unexpected error occurred.Please reload the page and try again.');
        }*/
        return back()->with('success','Insurance Company Created successfully.');

    }
    //Edit
    public function edit($id)
    {
        $details = InsuranceCompany::findorfail($id);
        return view('admin.companies.edit',[
            'details'=>$details
        ]);
    }
    //Update
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'location' => 'required',
            'details' => 'string',
            'logo'=>'mimes:jpeg,jpg,png,bmb,gif,svg',
        ]);

        $company = InsuranceCompany::findOrFail($id);
        $company->name = $request->name;
        $company->location = $request->location;
        $company->details = $request->details;
        $company->logo = $request->logo;

        if ($request->file('logo')) {
            $file = $request->file('logo');
            @unlink(public_path('upload/company/' . $company->logo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/company'), $filename);
            $company['logo'] = $filename;
        }

        $company->save();

        /*$createCompany = InsuranceCompany::where('id',$id)->update([
            'name'=>$request->input('name'),
            'location'=>$request->input('location'),
            'details'=>$request->input('details')
        ]);
        if (!$createCompany)
        {
            return back()->withInput()->with('error','An unexpected error occurred.Please try again.');
        }
        if ($request->hasFile('image'))
        {
            //Upload the damn image
            $filenamewithextension = $request->file('image')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('image')->getClientOriginalExtension();

            //filename to store
            $filenametostore = 'blog/'.time().'.'.$extension;

            //Upload File to s3
            $storeImage = Storage::disk('public')->put($filenametostore, fopen($request->file('image'), 'r+'), 'public');

            $fileUrl = $filenametostore;
            if ($storeImage)
            {
                $storePath = InsuranceCompany::where('id',$id)
                    ->update([
                        'logo'=>$fileUrl,
                    ]);
                return back()->with('success','Insurance Company Updated successfully.');
            }

            return back()->withInput()->with('errors','An unexpected error occurred.Please reload the page and try again.');
        }*/
        return back()->with('success','Insurance Company Updated successfully.');
    }
    //Delete companies
    public function delete($id)
    {
        $details = InsuranceCompany::findorfail($id);
        $details->delete();
        return back()->with('success','Company deleted successfully.');
    }
}
