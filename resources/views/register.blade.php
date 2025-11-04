@extends('login')
@section('containt')
    <div class="form-group">
        <label for="password_confirmation">{{$lang->labelUserRepeatPassword}}</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
        placeholder="{{$lang->hintUserRepeatPassword}}"
        title="{{$lang->hintUserRepeatPassword}}"
        minlength="8" 
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
        $('#password').on('input invalid', function() {
            if(this.value !== $('#password_confirmation').val() && $('#password_confirmation').val() !== '')
                $('#password_confirmation')[0].setCustomValidity(@json($lang->error7));
            else if(this.value === $('#password_confirmation').val())
                $('#password_confirmation')[0].setCustomValidity('');
        });
        $('#password_confirmation').on('input invalid', function() {
            if (this.validity.valueMissing)
                this.setCustomValidity(@json($lang->UserRepeatPasswordRequired));
            else if (this.validity.tooShort)
                this.setCustomValidity(@json($lang->UserRepeatPassword));
            else if(this.value !== $('#password').val())
                this.setCustomValidity(@json($lang->error7));
            else
                this.setCustomValidity('');
        });
    </script>
@endsection