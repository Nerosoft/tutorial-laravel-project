@extends('layout')
@section('containt')
<div class="container">
    @include('nav_admin')
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