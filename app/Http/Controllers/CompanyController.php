<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('id','asc')->paginate(20);
        return view('companyHome')->with('companies',$companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'companyName' => 'required',
            'companyEmail' => 'required',
            'companyUrl' => 'required',
            'companyLogo' => 'image|nullable|max:1999'

        ]);

        if($request->hasFile('companyLogo')){
            //get the filename with ext
            $fileNameWithExt = $request->file('companyLogo')->getClientOriginalName();


            //get just the filename
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);


            //get just the ext
            $extension = $request->file('companyLogo')->getClientOriginalExtension();


            // create filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;


            //upload image
            $path = $request->file('companyLogo')->storeAs('public/companyLogo',$fileNameToStore);

        }else{
            $fileNameToStore = 'noImage.jpg';
        }


        $company = new Company;
        $company->name = $request->input('companyName');
        $company->email= $request->input('companyEmail');
        $company->website = $request->input('companyUrl');
        $company->logo = $fileNameToStore;
        $company->save();
        return redirect('/Dashboard/companyHome')->with('success','Company Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('editCompany')->with('company',$company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = Company::find($id);

        $this->validate($request,[
            'companyName' => 'required',
            'companyEmail' => 'required',
            'companyUrl' => 'required',
            'companyLogo' => 'image|nullable|max:1999'

        ]);


        if($request->hasFile('companyLogo')){
            //get the filename with ext
            $fileNameWithExt = $request->file('companyLogo')->getClientOriginalName();


            //get just the filename
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);


            //get just the ext
            $extension = $request->file('companyLogo')->getClientOriginalExtension();


            // create filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;


            //upload image
            $path = $request->file('companyLogo')->storeAs('public/companyLogo',$fileNameToStore);

        }else{
            $fileNameToStore = 'noImage.jpg';
        }


        
        $company->name = $request->input('companyName');
        $company->email= $request->input('companyEmail');
        $company->website = $request->input('companyUrl');
        $company->logo = $fileNameToStore;
        $company->save();
        return redirect('/Dashboard/companyHome')->with('success','Company Saved');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect('/Dashboard/companyHome')->with('success','Company Deleted');
    }
}
