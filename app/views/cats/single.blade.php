<?php
/*
*  Single Cat View Page
*
 */
?>

@extends ('master')

@section('header')

    <a href="{{ URL::to('/') }}">Back to overview</a>
    <h2>
      {{{ $cat->name }}}
    </h2>
    @if ( Auth::check() and Auth::user()->canEdit($cat) )
      <a href="{{ url('cats/'.$cat->id .'/edit') }}">
        <span class="glyphicon glyphicon-edit"></span> Edit
      </a>
      <a href="{{ url('cats/'.$cat->id. '/delete') }}">
        <span class="glyphicon glyphicon-trash"></span> Delete
      </a>
      Last Edited: {{ $cat->updated_at }}
    @endif

@stop

@section('content')
  <p>Date of Birth: {{ $cat->date_of_birth }} </p>
  <p>
    @if ($cat->breed)
      Breed :
      {{ link_to('cats/breeds/' . $cat->breed->name, $cat->breed->name) }}
    @endif
  </p>
@stop
