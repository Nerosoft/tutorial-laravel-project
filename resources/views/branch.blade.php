@extends('layout')
@section('containt')
@include('nav_admin')
<div class="start-page container">
    <button class="btn btn-primary" onClick="openForm('#createModel')">{{$lang->button1}}</button>
    @include('all_model.model_branch', [
        'title'=>$lang->title2,
        'action'=>route('addBranchRays'),
        'button'=>$lang->button2])
   
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
            @foreach($lang->getDataTable() as $index=>$branch)
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
                    @if($index !== request()->session()->get('userId'))
                        @include('model_delete', ['name'=>$branch->getName(), 'action'=>route('branch.delete', 'Branches')])
                    @endif
                    <img class="style_icon_menu pointer" src="{{asset('/lib/icons/wrench-adjustable.svg')}}" onclick="displayEditForm($('#editForm{{$index}}').find('#brance-rays-name'), $('#editForm{{$index}}').find('#brance-rays-phone'), $('#editForm{{$index}}').find('#brance-rays-country'), $('#editForm{{$index}}').find('#brance-rays-governments'), $('#editForm{{$index}}').find('#brance-rays-city'), $('#editForm{{$index}}').find('#brance-rays-street'), $('#editForm{{$index}}').find('#brance-rays-building'), $('#editForm{{$index}}').find('#brance-rays-address'), $('#editForm{{$index}}').find('#brance-rays-follow option'), '#editModel{{$index}}', '{{$branch->getName()}}', '{{$branch->getPhone()}}', '{{$branch->getGovernments()}}', '{{$branch->getCity()}}', '{{$branch->getStreet()}}', '{{$branch->getBuilding()}}', '{{$branch->getAddress()}}', '{{$branch->getCountry()}}', '{{$branch->getFollowId()}}')"/>
                    @include('all_model.model_branch', [
                    'idModel'=>'editModel'.$index, 'title'=>$lang->title3, 'idForm'=>'editForm'.$index, 'action'=>route('editBranchRays'),
                    'button'=>$lang->button3])
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
<script type="text/javascript">
    let setting = [
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': false }
];

function displayEditForm(brance_rays_name, brance_rays_phone, brance_rays_country, brance_rays_governments, brance_rays_city, brance_rays_street, brance_rays_building, brance_rays_address, brance_rays_follow, id, nameTest, phoneTest, countryTest, governmentsTest, cityTest, streetTest, buildingTest, addressTest, followTest){
    removeClass(id);
    openForm(id);
    brance_rays_name.val(nameTest);
    brance_rays_phone.val(phoneTest);
    brance_rays_country.val(countryTest);
    brance_rays_governments.val(governmentsTest);
    brance_rays_city.val(cityTest);
    brance_rays_street.val(streetTest);
    brance_rays_building.val(buildingTest);
    brance_rays_address.val(addressTest);
    brance_rays_follow.each(function(){
        if($(this).html() === followTest)
            $(this).prop('selected', true);
    });
}
</script>
@endsection