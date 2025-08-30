@extends('layout')
@section('containt')
<div class="start-page container">
    @include('nav_admin')
    <button class="btn btn-primary" onClick="openForm('#createModel')">{{$lang->button1}}</button>
    @include('model_branch')
    <table id="example" class="table table-striped" >
        <thead>
            <tr>
                <th>{{ $lang->table7 }}</th>
                <th>{{ $lang->table9 }}</th>
                <th>{{ $lang->table10 }}</th>
                <th>{{ $lang->table16 }}</th>
                <th>{{ $lang->table17 }}</th>
                <th>{{ $lang->table8 }}</th>
                <th>{{ $lang->table12 }}</th>
                <th>{{ $lang->table13 }}</th>
                <th>{{ $lang->table14 }}</th>
                <th>{{ $lang->table15 }}</th>
                <th>{{ $lang->table11 }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lang->tableData as $index=>$branch)
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$branch->getName()}}</td>
                <td>{{$branch->getPhone()}}</td>
                <td>{{$branch->getGovernments()}}</td>
                <td>{{$branch->getCity()}}</td>
                <td>{{$branch->getStreet()}}</td>
                <td>{{$branch->getBuilding()}}</td>
                <td>{{$branch->getAddress()}}</td>
                <td>{{$branch->getCountry()}}</td>
                <td>{{$branch->getFollowId()}}</td>
                <td>
                    @include('model_delete', ['name'=>$branch->getName(), 'index'=>$index])
                   <img class="style_icon_menu pointer" src="{{asset('/lib/icons/wrench-adjustable.svg')}}" onclick="displayEditForm($('#editForm{{$index}}').find('#brance-rays-name'), $('#editForm{{$index}}').find('#brance-rays-phone'), $('#editForm{{$index}}').find('#brance-rays-country'), $('#editForm{{$index}}').find('#brance-rays-governments'), $('#editForm{{$index}}').find('#brance-rays-city'), $('#editForm{{$index}}').find('#brance-rays-street'), $('#editForm{{$index}}').find('#brance-rays-building'), $('#editForm{{$index}}').find('#brance-rays-address'), $('#editForm{{$index}}').find('#brance-rays-follow option'), '#editModel{{$index}}', '{{$branch->getName()}}', '{{$branch->getPhone()}}', '{{$branch->getGovernments()}}', '{{$branch->getCity()}}', '{{$branch->getStreet()}}', '{{$branch->getBuilding()}}', '{{$branch->getAddress()}}', '{{$branch->getCountry()}}', '{{$branch->getFollowId()}}')"/>
                    @include('model_branch')
                </td>
            </tr>
            @endforeach            
        </tbody>
        <tfoot>
            <tr>
                <th>{{ $lang->table7 }}</th>
                <th>{{ $lang->table9 }}</th>
                <th>{{ $lang->table10 }}</th>
                <th>{{ $lang->table16 }}</th>
                <th>{{ $lang->table17 }}</th>
                <th>{{ $lang->table8 }}</th>
                <th>{{ $lang->table12 }}</th>
                <th>{{ $lang->table13 }}</th>
                <th>{{ $lang->table14 }}</th>
                <th>{{ $lang->table15 }}</th>
                <th>{{ $lang->table11 }}</th>
            </tr>
        </tfoot>
    </table>
</div>
<script src="{{asset('js/branches.js')}}" type="text/javascript"></script>
@include('table_setting')
@endsection