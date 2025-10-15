@include('all_model.start_model')
@isset($index)
    @include('my_id', ['myAppId'=>$index])
@endisset
<div class="form-group">
    <label for="lang_name" class="form-label">{{$lang->LabelName}}</label>
    <input 
    minlength="3" 
    required
    oninvalid="handleInput(this ,'{{$lang->error1}}', '{{$lang->error2}}')"
    oninput="handleInput(this ,'{{$lang->error1}}', '{{$lang->error2}}')"
    type="text" name="name" id="name" value="{{$name}}" placeholder='{{$lang->HintName}}' class="form-control">
</div>
@if(!isset($index))
<div class="form-group">
    <label for="lang_name" class="form-label">{{$lang->LabelInputNumber}}</label>
    <input 
    minlength="3" 
    required
    oninvalid="handleInputSelect(this ,'{{$lang->error3}}')"
    oninput="handleInputSelect(this ,'{{$lang->error3}}')"
    type="number" name="input_number" id="input_number" value="{{$inputNumber}}" placeholder='{{$lang->HintInputNumber}}' class="form-control">
</div>
@endif
@include('all_model.end_model')

