@extends('layouts.app')

@section('content')
<style>
    a {
                color: green;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;

            }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">               
                    <a href="{{ url('/department') }}">Department</a>                  
                </div>
                <div class="card-header">
                <a href="{{ url('/position') }}">Position</a>
                </div>
                <div class="card-header"><a href="{{ url('/employee') }}">Employee</a>
                </div>
                <div class="card-header">
                    <a href="{{ url('/profile') }}">Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
