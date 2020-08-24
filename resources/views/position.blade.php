@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Add Position</h1>
        </div>
        <div class="row">
            <form action="position" method="post">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                @endif
                <div class="form-group">
                    <label for="position_name">Position Name</label>
                    <input type="text" class="form-control @error('position_name') is-invalid @enderror" id="position_name" name="position_name" placeholder="Position Name" value="{{ old('position_name') }}">
                    @error('position_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    
                </div>
                <div class="form-group">
                    <label for="position_name">Department Name</label>
                    <select class="@error('department_id') is-invalid @enderror" id="department_id" name="department_id">
                        @foreach($positions as $pos)
                            <option   value="{{$pos->department['id']}}">{{$pos->department['department_name']}}</option>

                        @endforeach
                    </select>
                    @error('department_id')
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
                        <th>Position Name</th>
                        <th>Department Name</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($positions as $position)
                        <tr>
                            <td>{{ $position->id }}</td>
                            <td>{{ $position->position_name }}</td>
                            <td>{{ $position->department['department_name']}}</td>
                            <td>{{ $position->created_at }}</td>
                            <td>{{ $position->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection