<?php
/*
*  Login Page View
*
 */
?>

@extends ('master')

@section('header')
  <h2>Please Log In</h2>
@stop

@section ('content')
 {{ Form::open() }}
 <div class="form-group">
    {{ Form::label('Username') }}
    {{ Form::text('username') }}
 </div>
 <div class="form-group">
    {{ Form::label('Password') }}
    {{ Form::text('password') }}
 </div>
  {{ Form::submit() }}
  {{ Form::close() }}

@stop
