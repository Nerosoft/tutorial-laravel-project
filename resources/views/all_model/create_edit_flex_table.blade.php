<!-- Modal -->
@include('all_model.start_model')
 @isset($index)
  @include('my_id', ['myAppId'=>$index])
@endisset
@foreach($arr as $key=>$value)
  <div class="mb-3">
      <label for="name" class="form-label">{{$lang->Label[$key]}}</label>
      <input 
      title="{{$lang->Hint[$key]}}"
      minlength="3" 
      required
      oninvalid="handleInput(this ,'{{$lang->ErrorsMessageReq[$key]}}', '{{$lang->ErrorsMessageInv[$key]}}')"
      oninput="handleInput(this ,'{{$lang->ErrorsMessageReq[$key]}}', '{{$lang->ErrorsMessageInv[$key]}}')"
      type="text" id="{{$key}}" class="form-control" name="{{$key}}" value="{{isset($index)?$value:''}}" placeholder="{{$lang->Hint[$key]}}">
  </div>
@endforeach
@include('all_model.end_model')
                


