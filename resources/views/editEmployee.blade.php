@extends('layouts.app')

    @section('content')

        @if ($employee)

            <div class = "container">
                <h3>Edit {{$employee->First_Name}}  {{$employee->Last_Name}}</h3>
                <br/>
                <form Action = "/Dashboard/employeeHome/{{$employee->id}}/store" method="POST">
                        @csrf
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
                    
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            
        @endif
        
    @endsection  