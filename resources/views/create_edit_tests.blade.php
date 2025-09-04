<!-- Modal -->
<div class="modal fade" id="{{isset($index) ? 'editModel'.$index : 'createModel'}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="SettingLanguage">{{isset($index) ? $lang->title3 : $lang->title2}}</h5>
        <button type="button" onclick="closeForm('{{isset($index) ? "#editModel".$index : "#createModel"}}')" class="btn btn-dark">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="{{isset($index) ? 'editForm'.$index : 'createForm'}}" action="{{ isset($index) ? route('editTest', $activeItem) : route('createTest', $activeItem) }}" method="POST">
            @csrf
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
                    type="text" class="form-control" id="name" name="name" value="{{isset($index) ? $test->getName() : ''}}" placeholder="{{$lang->hint1}}">
                </div>
                <div class="mb-3">
                    <label for="shortcut" class="form-label">{{$lang->label7}}</label>
                    <input 
                    title="{{$lang->hint3}}"
                    minlength="3" 
                    required
                    oninvalid="handleInput(this ,'{{$lang->error9}}', '{{$lang->error10}}')"
                    oninput="handleInput(this ,'{{$lang->error9}}', '{{$lang->error10}}')"
                    type="text" class="form-control" id="shortcut" name="shortcut" value="{{isset($index) ? $test->getShortcut() : ''}}" placeholder="{{$lang->hint3}}">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">{{$lang->label4}}</label>
                    <input 
                    title="{{$lang->hint2}}"
                    required
                    oninvalid="handleInputSelect(this, '{{$lang->error3}}')"
                    oninput="handleInputSelect(this, '{{$lang->error3}}')"
                    type="number" class="form-control" id="price" min="0" name="price" value="{{isset($index) ? $test->getPrice() : ''}}" placeholder="{{$lang->hint2}}">
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
                    <option {{isset($index) && $test->getInputOutputLabId() === $inp ? 'selected' : ''}} value="{{$key}}">{{$inp}}</option>
                    @endforeach
                    </select>
                </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" form="{{isset($index) ? 'editForm'.$index : 'createForm'}}" class="btn btn-primary" onclick="validForm('{{isset($index) ? '#editForm'.$index : '#createForm'}}')">{{isset($index) ? $lang->button3 : $lang->button2}}</button>
      </div>
    </div>
  </div>
</div>



