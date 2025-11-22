@extends('login')
@section('containt')
    <div class="form-group">
        <label for="password_confirmation">{{$lang->labelUserRepeatPassword}}</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
        placeholder="{{$lang->hintUserRepeatPassword}}"
        title="{{$lang->hintUserRepeatPassword}}"
        minlength="8" 
        oninvalid="handleInputPassConfirmPass(this, '{{$lang->UserRepeatPasswordRequired}}', '{{$lang->UserRepeatPassword}}', 'password')" 
        oninput="handleInputPassConfirmPass(this, '{{$lang->UserRepeatPasswordRequired}}', '{{$lang->UserRepeatPassword}}', 'password')"
        required>
    </div>
    <div class="form-group">
        <label for="codePassword">{{$lang->labelUserCodePassword}}</label>
        <input type="password" class="form-control" id="codePassword" name="codePassword"
        placeholder="{{$lang->hintUserCodePassword}}"
        title="{{$lang->hintUserCodePassword}}"
        minlength="8" 
        required 
        oninvalid="handleInput(this ,'{{$lang->error8}}', '{{$lang->error9}}')" 
        oninput="handleInput(this ,'{{$lang->error8}}', '{{$lang->error9}}')">
    </div>
    <script type="text/javascript">
        function handleInputPassConfirmPass(event, req, inv, id){
            if (event.validity.valueMissing)
                event.setCustomValidity(req);
            else if (event.validity.tooShort)
                event.setCustomValidity(inv);
            else if(event.value === $('#'+id).val()){
                event.setCustomValidity('');
                $('#'+id)[0].setCustomValidity('');
            }
            else if($(event).attr('id') === 'password' && event.value !== $('#'+id).val() && $('#'+id).val().length >=8){
                event.setCustomValidity('');
                $('#'+id)[0].setCustomValidity(@json($lang->error7));
            }
            else if(event.value !== $('#'+id).val() && $('#'+id).val().length >=8)
                event.setCustomValidity(@json($lang->error7));
            else if($(event).attr('id') === 'password')
                event.setCustomValidity('');
        }
    </script>
@endsection