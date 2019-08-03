@extends('layouts.app')

    @section('content')

        @if ($data)

            <div class = "container">
                 <br/>
                <h3>Edit {{$data['employee']->First_Name}}  {{$data['employee']->Last_Name}}</h3>
                <br/>
                <form Action = "/Dashboard/employeeHome/{{$data['employee']->id}}/store" method="POST">
                        @csrf
                        <div class="form-group">
                        
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" value = "{{$data['employee']->First_Name}}"name = "first" id="inputFirst" aria-describedby="emailHelp" placeholder="Enter First Name">
                        
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" id="inputLast" value="{{$data['employee']->Last_Name}}" name="last" aria-describedby="emailHelp" placeholder="Enter Last Name">
                        
                        </div>
                        <div class="form-group">
                            <label for="InputEmail1">Email address</label>
                            <input type="email" class="form-control" id="InputEmail1"  value = "{{$data['employee']->email}}"name = "email" aria-describedby="emailHelp" placeholder="Enter email">
                    
                        </div>
                        <div class="form-group">
                            <label for="inputPhoneNumber">Phone Number</label>
                            <input type="text" class="form-control" id="inputPhone" value = "{{ $data['employee']->Phone_Number}}" name = "phone" placeholder="Enter Phone Number">
                        </div>
                      <div class="form-group">
                         <label for="choosecompany">Choose Company</label>
                        <select class="form-control" id="chooseCompany" name = "selectCompany">
                        @foreach ($data["companies"] as $company)
                        <option value = "{{$company->id}}" >{{$company->name}}</option>
                        @endforeach
                        
                        </select>
                </div>
                    
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            
        @endif
        
    @endsection  