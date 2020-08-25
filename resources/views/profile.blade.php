@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>Add New Profile</h1>
    </div>
    <div class="row">
        <div class="col-md-4">
            <form action="profile" method="post">
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    Please fix the following errors
                </div>
                @endif
                <div class="form-group">
                    <label for="profile_age">Age</label>
                    <input type="text" class="form-control @error('profile_age') is-invalid @enderror" id="profile_age" name="profile_age" placeholder="Age" value="{{ old('profile_age') }}">
                    @error('profile_age')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="profile_height">Height</label>
                    <input type="text" class="form-control @error('profile_height') is-invalid @enderror" id="profile_height" name="profile_height" placeholder="Height" value="{{ old('profile_height') }}">
                    @error('profile_height')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="profile_father_name">Father Name</label>
                    <input type="text" class="form-control @error('profile_father_name') is-invalid @enderror" id="profile_father_name" name="profile_father_name" placeholder="Father Name" value="{{ old('profile_father_name') }}">
                    @error('profile_father_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="profile">Employee Name</label>
                    <select class="@error('employee_id') is-invalid @enderror" id="employee_id" name="employee_id">
                        @foreach($employees as $employee)
                        <option value="{{$employee->id}}">{{$employee->name}}</option>

                        @endforeach
                    </select>
                    @error('employee_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
        <div class="col-md-6" style="text-align: right;">
            <a class="btn btn-primary" href="{{ URL::to('/profile/pdf') }}">Export to PDF</a>
        </div>
    </div>
    <div class="row">
        <table class="table table-responsive common-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Age</th>
                    <th>Height</th>
                    <th>Father Name</th>
                    <th>Employee ID</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profiles as $profile)
                <tr>
                    <td>{{ $profile->id }}</td>
                    <td>{{ $profile->age }}</td>
                    <td>{{ $profile->height }}</td>
                    <td>{{ $profile->father_name }}</td>

                    <td><a href="{{route('detail',$profile->employee['id'])}}">{{ $profile->employee['id'] }}</a></td>
                    <td>{{ $profile->created_at }}</td>
                    <td>{{ $profile->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection