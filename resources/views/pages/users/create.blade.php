@extends('layouts.main')

@section('content')
    <h1 class="bg-danger text-white p-1">Create New User Account </h1>
    <hr>
    {!! Form::open(['url' => '/users', 'method' => 'post']) !!}
        <div class="ui form grid">
            <div class="fields two">
                <div class="four wide field">
                    <label for="">First Name</label>
                    <input type="text" name="firstname">
                </div>
            </div>
        </div>
    {!! Form::close() !!}

@endsection
