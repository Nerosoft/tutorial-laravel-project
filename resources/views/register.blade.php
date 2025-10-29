@extends('login')
@section('containt')
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
    <script type="text/javascript">
        $('#password').on('input invalid', function(e) {
            if($(this).val() != $('#password_confirmation').val())
                this.setCustomValidity(@json($lang->error7));
            else
            this.setCustomValidity(''); 
        });
        function handleInput2(event, error1, error2, error3) {
            if (event.validity.valueMissing)
                event.setCustomValidity(error1);
            else if (event.validity.tooShort)
                event.setCustomValidity(error2);
            else if(event.value != $('#password').val())
                event.setCustomValidity(error3);
            else
                event.setCustomValidity('');
        }
    </script>
@endsection