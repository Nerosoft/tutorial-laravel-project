@extends('layout')
@section('containt')
@include('nav_admin')
    <div class="start-page container">
        <button class="btn btn-primary" onClick="openForm('#createModel')">{{$lang->button1}}</button>
        @include('all_model.model_change_language', [
        'idModel'=>'createModel',
        'idForm'=>'createForm',
        'title'=>$lang->title2,
        'action'=>route('lang.createLanguage'),
        'button'=>$lang->button2])
        <div class=""> 
            <h1 id="greeting" class="text-center">{{$lang->label3}}</h1>
            <p id="description" class="text-center">{{$lang->label4}}</p>
        <div>
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th>{{$lang->table7}}</th>
                    <th>{{$lang->NameLangaue}}</th>
                    <th>{{$lang->table11}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lang->getDataTable() as $index=>$myLang)
                <tr>
                    <th>{{$loop->index+1}}</th>
                    <th>{{$myLang->getName()}}</th>
                    <th>
                        <img class="style_icon_menu pointer" src="{{asset('/lib/icons/copy.svg')}}" onclick="displayModel('#editModel{{$index}}', '{{$myLang->getName()}}')"/>
                       @include('all_model.model_change_language', ['idModel'=>'editModel'.$index, 'title'=>$lang->title3,
                        'idForm'=>'editForm'.$index, 'action'=>route('language.copy'),
                        'button'=>$lang->button3])
                        <img class="style_icon_menu pointer" src="{{asset('/lib/icons/'.($index === $lang->language ? 'lightbulb-fill.svg' : 'lightbulb.svg'))}}" onclick="openForm('#selectLanguage{{$index}}')"></i>
                        <div class="modal" id="selectLanguage{{$index}}" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{$lang->title2}}</h5>
                                        <button type="button" onclick="closeForm('#selectLanguage{{$index}}')" class="btn btn-dark">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('language.change')}}" method="POST">
                                        <div class="modal-body">
                                            @csrf
                                            @include('my_id')
                                            {{$lang->label5}}<spam>-{{$myLang->getName()}}</spam>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger">{{$lang->button4}}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @if($index !== $lang->language)
                        @include('model_delete', ['name'=>$myLang->getName(), 'action'=>route('language.delete')])
                        @endif
                    </th>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>{{$lang->table7}}</th>
                    <th>{{$lang->NameLangaue}}</th>
                    <th>{{$lang->table11}}</th>
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

function displayModel(id, value){
    removeClass(id);
    openForm(id);
    $(id).find('#lang_name').val(value);
}
</script>
@endsection
