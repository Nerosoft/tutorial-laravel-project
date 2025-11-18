@extends('layout')
@section('containt')
@include('nav_admin')
<div class="start-page container">
    <button class="btn btn-primary" onClick="openForm('#createModel')">{{$lang->button1}}</button>
   @include('all_model.custom_table', [
    'action'=>route('addTable'), 
    'title'=>$lang->model2, 
    'button'=>$lang->button2])

    <table id="example" class="table table-striped" >
        <thead>
            <tr>
                <th>{{ $lang->table7 }}</th>
                <th>{{ $lang->TableName }}</th>
                <th>{{ $lang->table11 }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lang->getDataTable() as $index=>$item)
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$item->getName()}}</td>
                <td>
                    @include('model_delete', ['name'=>$item->getName(), 'actionDelete'=>route('deleteTable')])
                   <img class="style_icon_menu pointer" src="{{asset('/lib/icons/wrench-adjustable.svg')}}" onclick="displayEditForm('#editModel{{$index}}', '{{$item->getName()}}')"/>
                   @include('all_model.custom_table', ['idModel'=>'editModel'.$index, 'idForm'=>'editForm'.$index, 'action'=>route('editTable'), 'title'=>$lang->model3, 'button'=>$lang->button3])
                </td>
            </tr>
            @endforeach            
        </tbody>
        <tfoot>
            <tr>
                <th>{{ $lang->table7 }}</th>
                <th>{{ $lang->TableName }}</th>
                <th>{{ $lang->table11 }}</th>
            </tr>
        </tfoot>
    </table>
</div>
<script type="text/javascript">
    let setting = [
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': false }
];
function displayEditForm(id, name){
    removeClass(id);
    openForm(id);
    $(id).find('#name').val(name);
}
 $('#input_number').on('input invalid', function() {
    if (this.validity.valueMissing)
        this.setCustomValidity(@json($lang->error3));
    else if (this.value < 1 || this.value > 8)
        this.setCustomValidity(@json($lang->error4));
    else
        this.setCustomValidity('');
});

</script>
@include('table_setting')
@endsection