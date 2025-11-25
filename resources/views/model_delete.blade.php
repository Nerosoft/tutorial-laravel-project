<img class="style_icon_menu pointer" src="{{asset('/lib/icons/trash3.svg')}}" onclick="openForm('#deleteModel{{$index}}')"/>
@include('all_model.start_model', ['title'=>$lang->titleModelDelete, 'idModel'=>'deleteModel'.$index, 'idForm'=>'deleteForm'.$index])
{{ $lang->messageModelDelete }}<spam>-{{ $name }}</spam>
@csrf
@include('my_id')
@include('all_model.button_modal', ['button'=>$lang->buttonModelDelete])