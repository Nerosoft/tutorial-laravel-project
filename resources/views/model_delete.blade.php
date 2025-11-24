<img class="style_icon_menu pointer" src="{{asset('/lib/icons/trash3.svg')}}" onclick="openForm('#{{$idModel}}')"/>
@include('all_model.start_model')
{{ $lang->messageModelDelete }}<spam>-{{ $name }}</spam>
@csrf
@include('my_id')
@include('all_model.end_model')

