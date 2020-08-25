@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Add Position</h1>
        </div>
        <div class="row">
            <div class="col-md-7">
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
                        <label for="department_name">Department Name</label>
                        <select class="@error('department_id') is-invalid @enderror" id="department_id" name="department_id">
                            @foreach($departments as $department)
                                <option   value="{{$department->id}}">{{$department->department_name}}</option>

                            @endforeach
                        </select>
                        @error('department_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="row" style="margin-top:30px">
        <div class="col-md-3">
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
            <div class="col-md-3" style="text-align: right;" > 
                <a class="btn btn-success" href="{{ route('file-export-csv') }}">Export data(CSV)</a> 
            </div>
            <div class="col-md-3" style="text-align: right;"> 
                <a class="btn btn-success" href="{{ route('file-export-xlsx') }}">Export data(XLSX)</a>
            </div>
            <div class="col-md-3" style="text-align: right;"> 
                <a class="btn btn-primary" href="{{ URL::to('/position/pdf') }}">Export to PDF</a>
            </div>
        </div>
        <hr>
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