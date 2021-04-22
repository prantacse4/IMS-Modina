<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyCreateRequest;
use App\Models\Backend\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function company()
    {
        $companies = Company::orderBy('id','DESC')->get();
        return view('admin.pages.company.company', compact('companies'));
    }

    public function companyviewer($id)
    {
        $company = Company::where('id',$id)->get();
        return view('admin.pages.company.viewcompany', compact('company'));
    }



    public function addcompany()
    {
        return view('admin.pages.company.addcompany');
    }

    public function store(CompanyCreateRequest $request)
    {
        Company::create($request->all());
        return redirect(route('admin.company'))->with('message','Company added successfully!');
    }

    public function delete(Company $company)
    {
        $company->delete();
        return redirect(route('admin.company'))->with('message','Deleted Successfully');
    }


    public function editcompany($id)
    {
        $company = Company::where('id', $id)->get();

        return view('admin.pages.company.editcompany', compact('company'));
    }

    public function updatecompany(Request $request, Company $company)
    {
        $company->update($request->all());
        return redirect('admin/company')->with('message', 'Updated Successfully!');
    }
}
