@extends('layout')
@section('containt')
@include('nav_admin')
<div class="start-page container">
<button class="btn btn-primary" onClick="openForm('#createModel')">{{$lang->button1}}</button>
@include('all_model.create_edit_flex_table',[
    'idModel'=>'createModel',
    'idForm'=>'createForm',
    'title'=>$lang->title2, 
    'action'=>route('createFlexTable', request()->route('id')), 
    'button'=>$lang->button2])
<table id="example" class="table table-striped">
    <thead>
            <tr>
                <th>{{$lang->table7}}</th>
                @foreach($lang->TableHead as $index=>$name)
                    <th>{{$name}}</th>
                @endforeach
                <th>{{$lang->table11}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lang->getDataTable() as $index=>$items)
            <tr>
                <th>{{$loop->index+1}}</th>
                @foreach($items as $item)
                    <th>{{$item}}</th>
                @endforeach
                <th>
                    @include('model_delete', ['name'=>$items[array_key_first($items)], 'action'=>route('deleteItem', request()->route('id'))])
                    <img class="style_icon_menu pointer" src="{{asset('/lib/icons/wrench-adjustable.svg')}}" onclick="displayEditForm('#editModel{{$index}}', '{{json_encode($items)}}')"/>
                    @include('all_model.create_edit_flex_table', ['idModel'=>'editModel'.$index, 'title'=>$lang->title3, 'idForm'=>'editForm'.$index, 'action'=>route('editFlexTable', request()->route('id')), 'button'=>$lang->button3])
                </th>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
             <tr>
                <th>{{$lang->table7}}</th>
                @foreach($lang->TableHead as $index=>$name)
                    <th>{{$name}}</th>
                @endforeach
                <th>{{$lang->table11}}</th>
            </tr>
        </tfoot>
        
</table>
</div>
<script type="text/javascript">
    let setting = [{ 'searchable': true, className: "text-left" }];
    for (const key in @json($lang->TableHead))
        setting.push({ 'searchable': true, className: "text-left" });
    setting.push({ 'searchable': false, className: "text-left" });
    function displayEditForm(id, obj){
        removeClass(id);
        openForm(id);
        let myObj = JSON.parse(obj); 
        for (const key in myObj) 
            $(id).find('#'+key).val(myObj[key]);
    }
</script>
@endsection
