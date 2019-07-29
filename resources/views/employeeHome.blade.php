@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row ">
            <div class="table-responsive">
            <h2>Employee</h2>
            <br/>
                        <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Company</th>
                            <th></th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                           @if (count($employees)>0)
                           
                             @foreach ($employees as $employee)
                                <tr>
                                <td>{{$employee->id}}</td>
                                <td>{{$employee->First_Name}}</td>
                                <td>{{$employee->Last_Name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->Phone_Number}}</td>
                                <td></td>
                                <td><a class="btn btn-primary" href="/Dashboard/employeeHome/{{$employee->id}}/Edit" role="button">Edit</a></td>
                                <td><form action = "/Dashboard/employeeHome/{{$employee->id}}/Delete" method = "POST">@csrf <button type="submit" class="btn btn-primary btn-danger">Delete</button></form></td>

                                </tr>
                            @endforeach    
                           @else

                           <p>No Available Employee</p>
                               
                           @endif
                            
                        </tbody>
                        </table>
            </div>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Employee
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form Action = "/Dashboard/employeeHome/store" method="POST">
        @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" name = "first" id="inputFirst" aria-describedby="emailHelp" placeholder="Enter First Name">
                   
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="inputLast" name="last" aria-describedby="emailHelp" placeholder="Enter Last Name">
                 
                </div>
                <div class="form-group">
                    <label for="InputEmail1">Email address</label>
                    <input type="email" class="form-control" id="InputEmail1" name = "email" aria-describedby="emailHelp" placeholder="Enter email">
                   
                </div>
                <div class="form-group">
                    <label for="inputPhoneNumber">Phone Number</label>
                    <input type="text" class="form-control" id="inputPhone" name = "phone" placeholder="Enter Phone Number">
                </div>
                <div class="form-group">
                    <label for="inputCompany">Company</label>
                    <input type="text" class="form-control" id="inputCompany" name = "company" placeholder="Enter Company">
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



