<!-- Modal -->
@include('all_model.start_model') 
@isset($index)
    @include('my_id', ['myAppId'=>$index])
@endisset
<div class="mb-3">
    <label for="name" class="form-label">{{$lang->label3}}</label>
    <input 
    title="{{$lang->hint1}}"
    minlength="3" 
    required
    oninvalid="handleInput(this ,'{{$lang->error1}}', '{{$lang->error2}}')"
    oninput="handleInput(this ,'{{$lang->error1}}', '{{$lang->error2}}')"
    type="text" class="form-control" id="name" name="name" value="{{$name}}" placeholder="{{$lang->hint1}}">
</div>
<div class="mb-3">
    <label for="shortcut" class="form-label">{{$lang->label7}}</label>
    <input 
    title="{{$lang->hint3}}"
    minlength="3" 
    required
    oninvalid="handleInput(this ,'{{$lang->error9}}', '{{$lang->error10}}')"
    oninput="handleInput(this ,'{{$lang->error9}}', '{{$lang->error10}}')"
    type="text" class="form-control" id="shortcut" name="shortcut" value="{{$shortcut}}" placeholder="{{$lang->hint3}}">
</div>
<div class="mb-3">
    <label for="price" class="form-label">{{$lang->label4}}</label>
    <input 
    title="{{$lang->hint2}}"
    required
    oninvalid="handleInputSelect(this, '{{$lang->error3}}')"
    oninput="handleInputSelect(this, '{{$lang->error3}}')"
    type="number" class="form-control" id="price" min="0" name="price" value="{{$price}}" placeholder="{{$lang->hint2}}">
</div>
<div class="mb-3">
    <label for="input-output-lab" class="form-label">{{$lang->label5}}</label>
    <select 
    title="{{$lang->selectBox1}}"
    required
    oninvalid="handleInputSelect(this, '{{$lang->error4}}')"
    oninput="handleInputSelect(this, '{{$lang->error4}}')"
    class="form-select" id="input-output-lab" name="input-output-lab">
    <option value="" selected disabled>{{$lang->selectBox1}}</option>
    @foreach($lang->inputOutPut as $key=>$inp)
    <option {{$inputOutputLabId === $inp ? 'selected' : ''}} value="{{$key}}">{{$inp}}</option>
    @endforeach
    </select>
</div>
@include('all_model.end_model')



