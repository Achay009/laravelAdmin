@extends('layouts.app')


    @section('content')

        @if ($company)

            <div class="container">
                <h3>Edit {{$company->name}}</h3>
                <br/>

                <form action="/Dashboard/companyHome/{{$company->id}}/store" method="POST" enctype="multipart/form-data">
                    @csrf
                     <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" class="form-control"  value = "{{$company->name}}"name = "companyName" id="companyName" aria-describedby="emailHelp" placeholder="Enter Company Name">
                   
                </div>
                <div class="form-group">
                    <label for="companyEmail1"> Company Email address</label>
                    <input type="email" class="form-control" id="companyEmail" value= "{{$company->email}}" name = "companyEmail" aria-describedby="emailHelp" placeholder="Enter Company email">
                   
                </div>
                <div class="form-group">
                    <label for="comapnyUrl">Company</label>
                    <input type="text" class="form-control" id="companyUrl" value = "{{$company->website}}" name = "companyUrl" placeholder="Enter Company URL">
                </div>
                <div class="form-group">
                  <label for="companyLogo">Company Logo</label>
                  <input type="file" class="form-control-file" value = "{{$company->logo}}" name = "companyLogo" id="companyLogo">
                  <small id="imageDesc" class="form-text text-muted">Please Images must not be more than 2MB</small>
                </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            <div>
            
        @endif
        
    @endsection
    