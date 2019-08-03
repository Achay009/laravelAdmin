@extends('layouts.app')

    @section('content')
<div class="container-fluid">
    <div class="row ">
            <div class="table-responsive">
            <h2>Company</h2>
            <br/>
                        <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                            <th>Company </th>
                            <th>Company Name</th>
                            <th>Company Email</th>
                            <th>Company Website</th>
                            <th>Company Logo</th>
                            <th></th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                              @if (count($companies)>0)
                               <div style = "display : none;"> {{$count = 1}}</div>
                             @foreach ($companies as $company)

                                <tr>
                                <td>{{$count++}}</td>
                                <td><a href="/Dashboard/{{$company->name}}/{{$company->id}}/employees">{{$company->name}}</a></td>
                                <td>{{$company->email}}</td>
                                <td>{{$company->website}}</td>
                                <td><img style = " width:15%; height15%; border-radius: 50%;"src = "/storage/companyLogo/{{$company->logo}}"/></td>
                                
                                <td><a class="btn btn-primary" href="/Dashboard/companyHome/{{$company->id}}/Edit" role="button">Edit</a></td>
                                <td><form action = "/Dashboard/companyHome/{{$company->id}}/Delete" method = "POST">@csrf <button type="submit" class="btn btn-primary btn-danger">Delete</button></form></td>

                                </tr>
                            @endforeach    
                           @else

                           <p>No Available Company</p>
                               
                           @endif
                            
                        </tbody>
                        </table>
            </div>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Company
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Company</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form Action = "/Dashboard/companyHome/store" method="POST" enctype = "multipart/form-data">
        @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" class="form-control" name = "companyName" id="companyName" aria-describedby="emailHelp" placeholder="Enter Company Name">
                   
                </div>
                <div class="form-group">
                    <label for="companyEmail1"> Company Email address</label>
                    <input type="email" class="form-control" id="companyEmail" name = "companyEmail" aria-describedby="emailHelp" placeholder="Enter Company email">
                   
                </div>
                <div class="form-group">
                    <label for="comapnyUrl">Company</label>
                    <input type="text" class="form-control" id="companyUrl" name = "companyUrl" placeholder="Enter Company URL">
                </div>
                <div class="form-group">
                  <label for="companyLogo">Company Logo</label>
                  <input type="file" class="form-control-file"  name = "companyLogo" id="companyLogo">
                      <small id="imageDesc" class="form-text text-muted">Please Images must not be more than 2MB</small>
                </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
     </form> 
    </div>
  </div>
</div>
    </div>
</div>
@endsection


