@extends('layout')
@section('containt')
@include('nav_admin')
<div class="start-page container">
<button class="btn btn-primary" onClick="openForm('#createModel')">{{$lang->button1}}</button>
@include('create_edit_tests')
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
                @include('create_edit_tests')
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
