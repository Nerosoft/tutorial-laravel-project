@extends('layout')
@section('containt')
@include('nav_admin')
<div class="start-page container">
<button class="btn btn-primary" onClick="openForm('#createModel')">{{$lang->button1}}</button>
@include('all_model.create_edit_tests', ['idModel'=>'createModel', 'title'=>$lang->title2, 'idForm'=>'createForm', 'action'=>route('createTest', request()->route('id')), 'name'=>'', 'shortcut'=>'', 'price'=>'', 'inputOutputLabId'=>'', 'button'=>$lang->button2])
<table id="example" class="table table-striped">
    <thead>
            <tr>
                <th>{{$lang->table7}}</th>
                <th>{{$lang->table8}}</th>
                <th>{{$lang->table12}}</th>
                <th>{{$lang->table9}}</th>
                <th>{{$lang->table10}}</th>
                <th>{{$lang->table11}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lang->getDataTable() as $index=>$test)
            <tr>
                <th>{{$loop->index+1}}</th>
                <th>{{$test->getName()}}</th>
                <th>{{$test->getShortcut()}}</th>
                <th>{{$test->getPrice()}}</th>
                <th>{{$test->getInputOutputLabId()}}</th>
                <th>
                @include('model_delete', ['name'=>$test->getName(), 'actionDelete'=>route('deleteItem', request()->route('id'))])
                <img class="style_icon_menu pointer" src="{{asset('/lib/icons/wrench-adjustable.svg')}}" onclick="displayEditForm('#editModel{{$index}}', $('#editForm{{$index}}').find('#name'), $('#editForm{{$index}}').find('#shortcut'), $('#editForm{{$index}}').find('#price'), $('#editForm{{$index}}').find('#input-output-lab option'), '{{$test->getName()}}', '{{$test->getShortcut()}}', '{{$test->getPrice()}}', '{{$test->getInputOutputLabId()}}')"/>
                @include('all_model.create_edit_tests', ['idModel'=>'editModel'.$index, 'title'=>$lang->title3, 'idForm'=>'editForm'.$index, 'action'=>route('editTest', request()->route('id')), 'name'=>$test->getName(), 'shortcut'=>$test->getShortcut(), 'price'=>$test->getPrice(), 'inputOutputLabId'=>$test->getInputOutputLabId(), 'button'=>$lang->button3])
                </th>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
             <tr>
                <th>{{$lang->table7}}</th>
                <th>{{$lang->table8}}</th>
                <th>{{$lang->table12}}</th>
                <th>{{$lang->table9}}</th>
                <th>{{$lang->table10}}</th>
                <th>{{$lang->table11}}</th>
            </tr>
        </tfoot>
        
</table>
</div>
<script src="{{asset('js/all_test_cultures.js')}}" type="text/javascript"></script>
@include('table_setting')
@endsection
