@extends('layout')
@section('head')
<link rel='stylesheet' href="{{asset('css/login.css')}}">
@endsection
@section('containt')
<div class="container">
    <div class="login">
        <form id='login' method='POST' action="{{route('makeRegister')}}" onsubmit="return confirmPassword(this)">
            @include('login_form')
            <div class="form-group">
                <label for="password_confirmation">{{$lang->labelUserRepeatPassword}}</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                placeholder="{{$lang->hintUserRepeatPassword}}"
                title="{{$lang->hintUserRepeatPassword}}"
                minlength="8" 
                required 
                oninvalid="handleInput2(this ,'{{$lang->UserRepeatPasswordRequired}}', '{{$lang->UserRepeatPassword}}', '{{$lang->error7}}')"
                oninput="handleInput2(this ,'{{$lang->UserRepeatPasswordRequired}}', '{{$lang->UserRepeatPassword}}', '{{$lang->error7}}')">
            </div>
            <div class="form-group">
                <label for="codePassword">{{$lang->labelUserCodePassword}}</label>
                <input type="password" class="form-control" id="codePassword" name="codePassword"
                value="{{old('codePassword')}}" placeholder="{{$lang->hintUserCodePassword}}"
                title="{{$lang->hintUserCodePassword}}"
                minlength="8" 
                required 
                oninvalid="handleInput(this ,'{{$lang->error8}}', '{{$lang->error9}}')" 
                oninput="handleInput(this ,'{{$lang->error8}}', '{{$lang->error9}}')">
            </div>
        </form>
        @include('language_modal')
    </div>
</div>

<script src="{{asset('js/login.js')}}" type="text/javascript"></script>
<script src="{{asset('js/register.js')}}" type="text/javascript"></script>
@endsection