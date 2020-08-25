@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Add new Department</h1>
        </div>
        <div class="row">
            <form action="department" method="post">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                    <!-- <ui>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                        
                    </ui> -->
                @endif
                <div class="form-group">
                    <label for="department_name">Department Name</label>
                    <input type="text" class="form-control @error('department_name') is-invalid @enderror" id="department_name" name="department_name" placeholder="Department Name" value="{{ old('department_name') }}">
                    @error('department_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
        <div class="row">
            <table class="table table-responsive common-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Department Name</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                        <tr>
                            <td>{{ $department->id }}</td>
                            <td>{{ $department->department_name }}</td>
                            <td>{{ $department->created_at }}</td>
                            <td>{{ $department->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            {{$departments->links()}}
        </div>
        
    </div>
@endsection