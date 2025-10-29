@extends('layout2')
@section('containt')
<div class="container">
    <div class="login">
        <form id='login' method='POST' action="{{route('makeLogin')}}">
            @include('login_form')
        </form>
        @include('all_model.language_modal')
    </div>
</div>
<script src="{{asset('js/login.js')}}" type="text/javascript"></script>
@endsection