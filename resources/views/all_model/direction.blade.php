<th>
    <img class="style_icon_menu pointer" src="{{asset('/lib/icons/wrench-adjustable.svg')}}" onclick="displayEditForm('#editModel{{$index}}', $('#editForm{{$index}}').find('#word'), '{{$items}}')"/> 
    @include('all_model.start_model')
    <h3>{{$lang->label4}} <span id="label" class="badge text-bg-secondary"></span></h3>
        <select id="mySelectBox" name="word" class="form-select" aria-label="Default select example">
        <option class="dropdown-item" {{$items === 'ltr'? 'selected':''}} value="ltr">{{$lang->Left}}</option>
        <option class="dropdown-item" {{$items === 'rtl'? 'selected':''}} value="rtl">{{$lang->Right}}</option>
    </select>
    @include('all_model.end_model')
</th>

                   