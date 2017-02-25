@extends('layouts.master')

@section('title', 'Article')
@section('content')
    <div class="col-lg-12 noborder">
        <div class="col-lg-12 border">

            <h1>{{ $articles->title }}</h1>
            <p>{{ $articles->content }}</p>
        </div>
    </div>
@endsection
