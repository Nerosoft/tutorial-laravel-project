@extends('layout')
@section('head')
<link rel='stylesheet' href="{{asset('css/login.css')}}">
@endsection
@section('containt')
<div class="container">
    <div class="login">
        <form id='login' method='POST' action="{{route('makeLogin')}}">
            @include('login_form')
        </form>
        @include('language_modal')
    </div>
</div>

<script src="{{asset('js/login.js')}}" type="text/javascript"></script>
@endsection