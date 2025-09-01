<div class="modal" id="{{isset($index)?'copyModel'.$index:'createModel'}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{isset($index)?$lang->title3:$lang->title2}}</h5>
                <button type="button" onclick="closeForm('{{isset($index)?'#copyModel'.$index:'#createModel'}}')" class="btn btn-dark">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="{{isset($index) ? 'editForm'.$index : 'createForm'}}" action="{{isset($index) ? route('language.copy') : route('lang.createLanguage')}}" method="POST">
                <div class="modal-body">
                    @csrf
                    @isset($index)
                    @include('my_id', ['myAppId'=>$index])
                    @endisset
                    <div class="form-group">
                        <label for="lang_name" class="form-label">{{isset($index)?$lang->label6:$lang->LabelNameLanguage}}</label>
                        <input 
                        minlength="3" 
                        required
                        oninvalid="handleInput(this ,'{{$lang->error1}}', '{{$lang->error2}}')"
                        oninput="handleInput(this ,'{{$lang->error1}}', '{{$lang->error2}}')"
                        type="text" name="lang_name" id="lang_name" value="{{isset($index)?$myLang->getName():''}}" placeholder='{{isset($index)?$lang->HintCopyLanguage:$lang->hint1}}' class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" onclick="validForm('{{isset($index) ? '#editForm'.$index : '#createForm'}}')">{{isset($index)?$lang->button3:$lang->button2}}</button>
                </div>
            </form>
        </div>
    </div>
</div>