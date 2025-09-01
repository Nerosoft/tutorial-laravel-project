@extends('layout')
@section('containt')
@include('nav_admin')
    <div class="start-page container">   
        <div class="text-left"> 
            <button class="btn btn-primary" onClick="openForm('#createModel')">{{$lang->button1}}</button>
        <div>
        @include('model_change_language')
        <div class="text-center"> 
            <h1 id="greeting">{{$lang->label3}}</h1>
            <p id="description">{{$lang->label4}}</p>
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
                @foreach($lang->tableData as $index=>$myLang)
                <tr>
                    <th>{{$loop->index+1}}</th>
                    <th>{{$myLang->getName()}}</th>
                    <th>
                        <img class="style_icon_menu pointer" src="{{asset('/lib/icons/copy.svg')}}" onclick="displayModel('#copyModel{{$index}}', '{{$myLang->getName()}}')"/>
                        @include('model_change_language')
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
                                            @include('my_id', ['myAppId'=>$index])
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
                        @include('model_delete', ['name'=>$myLang->getName()])
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
<script src="{{asset('js/change_language.js')}}" type="text/javascript"></script>
@extends('table_setting')
@endsection
