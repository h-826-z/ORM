@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Add new Employee</h1>
        </div>
        <div class="row">
            <div class="col-md-4"> 
                <form action="employee" method="post">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            Please fix the following errors
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="employee_name">Employee Name</label>
                        <input type="text" class="form-control @error('employee_name') is-invalid @enderror" id="employee_name" name="employee_name" placeholder="Employee Name" value="{{ old('employee_name') }}">
                        @error('employee_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                    </div>
                    <div class="form-group">
                        <label for="position">Position Name</label>
                        <select class="@error('position_id') is-invalid @enderror" id="position_id" name="position_id">
                            @foreach($positions as $position)
                            <option   value="{{$position->id}}">{{$position->position_name}}</option>
                        
                            @endforeach
                        </select>
                            @error('position_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        
                    </div>
                    <div class="form-group">
                        <label for="employee_email">Email</label>
                        <input type="email" class="form-control @error('employee_email') is-invalid @enderror" id="employee_email" name="employee_email" placeholder="Employee Email" value="{{ old('employee_email') }}">
                        @error('employee_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror       
                    </div>

                    <div class="form-group">
                        <label for="employee_salary">Employee Salary</label>
                        <input type="text" class="form-control @error('employee_salary') is-invalid @enderror" id="employee_salary" name="employee_salary" placeholder="Employee Salary" value="{{ old('employee_salary') }}">
                        @error('employee_salary')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                    </div> 
                    <div class="form-group">
                        <label for="employee_description">Description</label>
                        <input type="textarea" class="form-control @error('employee_description') is-invalid @enderror" id="employee_description" name="employee_description" placeholder="Description" value="{{ old('employee_description') }}">
                        @error('employee_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
            <div class="col-md-4">
                <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                        <div class="custom-file text-left">
                            <input type="file" name="file" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <button class="btn btn-primary">Import data</button>
                </form>
            </div>
            <div class="col-md-2"> 
                <a class="btn btn-success" href="{{ route('file-export') }}">Export data</a>
            </div>
            <div class="col-md-2">
                <a class="btn btn-primary" href="{{ URL::to('/employee/pdf') }}">Export to PDF</a>
            </div>

           
        </div>
        <div class="row">
        
            
            <table class="table table-responsive common-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Employee Name</th>
                        <th>Position Name</th>
                        <th>Email</th>
                        <th>Salary</th>
                        <th>Description</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->position['position_name'] }}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->salary}}</td>
                            <td>{{$employee->description}}</td>
                            <td>{{ $employee->created_at }}</td>
                            <td>{{ $employee->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
@endsection