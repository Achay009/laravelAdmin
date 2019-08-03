@extends('layouts.app')
@section('content')

        <div class="container-fluid">
         <div class="row ">
            <div class="table-responsive">
            <h2>Employee Data</h2>
            <br/>
                        <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                            <th>Employee</th>
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
                            <div style = "display : none;"> {{$count = 1}}</div>
                             @foreach ($employees as $employee)
                                <tr>
                                <td>{{$count++}}</td>
                                <td>{{$employee->First_Name}}</td>
                                <td>{{$employee->Last_Name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->Phone_Number}}</td>
                                <td>{{$employee->company_name}}</td>
                               

                                </tr>
                            @endforeach    
                           @else

                           <p>No Available Employee</p>
                               
                           @endif
                            
                        </tbody>
                        </table>
            </div>
        <!-- Button trigger modal -->
<a type="button" class="btn btn-primary" href="/Dashboard/companyHome">
  Back
</a>
    

@endsection