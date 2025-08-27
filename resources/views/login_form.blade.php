@include('my_id', ['myAppId'=>$lang->myAppId])
<h4>{{$lang->label4}}</h4>
<div class="form-group">
    <label for="email">{{$lang->label2}}</label>
    <input type="text" class="form-control" id="email" name="email"
        value="{{old('email')}}" placeholder="{{$lang->hint1}}"
        title="{{$lang->hint1}}"
        email
        required 
        oninvalid="IsEmail(this, '{{$lang->errorUserEmailRequired}}', '{{$lang->errorUserEmail}}')"
        oninput="IsEmail(this, '{{$lang->errorUserEmailRequired}}', '{{$lang->errorUserEmail}}')">
</div>
<div class="form-group">
    <label for="password">{{$lang->label3}}</label>
    <input type="password" class="form-control" value="{{old('password')}}" id="password" name="password"
        placeholder="{{$lang->hint2}}"
        title="{{$lang->hint2}}"
        minlength="8" 
        required 
        oninvalid="handleInput(this ,'{{$lang->errorUserPasswordRequired}}', '{{$lang->errorUserPassword}}')"
        oninput="handleInput(this ,'{{$lang->errorUserPasswordRequired}}', '{{$lang->errorUserPassword}}')">
</div>