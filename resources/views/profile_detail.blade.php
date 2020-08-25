@extends('layouts.app')
@section('content')
<style>
        #employee {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 60%;
        }

        #employee td, #employee th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #employee tr:nth-child(even){background-color: #f2f2f2;}

        #employee tr:hover {background-color: #ddd;}

        #employee th {
            padding-top: 12px;
            padding-bottom: 12px;
            font-size: 20px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
</style>
    <div class="container">
        
        <div class="row">
                <table id="employee">
                        <tr><th>Here is Employee Detail</th><th></th></tr>
                    
                        @foreach ($employee as $emp)
                                <tr>
                                    <td>ID</td>
                                    <td>{{ $emp->id }}</td>
                                </tr>
                                <tr>
                                    <td>Employee Name</td>
                                    <td>{{ $emp->name }}</td>
                                </tr>
                                <tr>
                                    <td>Position Name</td>
                                    <td>{{ $emp->position['position_name'] }}</td>
                                </tr>
                                <tr>
                                    <td>Department Name</td>
                                    <!-- join three table (profile,position,department) -->
                                    <td>{{ $emp->position->department['department_name'] }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$emp->email}}</td>
                                </tr>
                                <tr>
                                    <td>Salary</td>
                                    <td>{{$emp->salary}}</td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>{{$emp->description}}</td>
                                </tr>
                                <tr>
                                    <td>Created Date</td>
                                    <td>{{ $emp->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Updated Date</td>
                                    <td>{{ $emp->updated_at }}</td>
                                </tr>
                        @endforeach
                   
                </table>
            </div>
    </div>
@endsection