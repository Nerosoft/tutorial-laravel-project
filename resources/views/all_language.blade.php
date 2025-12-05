@extends('layout')
@section('containt')
@include('nav_admin')
<div class="start-page container">
    <table id="example" class="table table-striped" >
        <thead>
            <tr>
                <th>{{$lang->table7}}</th>
                @if(!request()->route('lang') && !request()->route('id'))
                <th>{{$lang->table10}}</th>
                @endif
                <th>{{$lang->LanguageValue}}</th>
                <th>{{$lang->table11}}</th>
            </tr>
        </thead>
        @php
            $index = 1
        @endphp
        <tbody id="table-data">
            @if(!request()->route('lang') && !request()->route('id'))
                @foreach($lang->getDataTable() as $myNameLang=>$data)
                    @foreach($data as $key=>$myData)
                        @foreach($myData as $key2=>$items)
                            @if(is_array($items))
                                @foreach($items as $key3=>$item)
                                    <tr>
                                        <th>{{$index++}}</th>
                                        <th>{{$lang->getDataTable()[$lang->language]['AllNamesLanguage'][$myNameLang]}}</th>
                                        <th>{{$item}}</th>
                                        @include('all_model.menu_array', ['idModel'=>'editModel'.$index, 'title'=>$lang->title3, 'idForm'=>'editForm'.$index, 'button'=>$lang->button3, 'action'=>route('edit.editAllLanguage', ['lang'=>$myNameLang, 'id'=>$key, 'name'=>$key2, 'item'=>$key3])])
                                    </tr>
                                @endforeach
                            @elseif($key === 'Html')
                                <tr>
                                    <th>{{$index++}}</th>
                                    <th>{{$lang->getDataTable()[$lang->language]['AllNamesLanguage'][$myNameLang]}}</th>
                                    <th>{{$items}}</th>
                                    @include('all_model.direction', ['idForm'=>'editForm'.$index, 'idModel'=>'editModel'.$index, 'title'=>$lang->model2, 'button'=>$lang->button2, 'action'=>route('edit.editAllLanguage', ['lang'=>$myNameLang, 'id'=>$key, 'name'=>$key2])])
                                </tr>
                            @else
                                <tr>
                                    <th>{{$index++}}</th>
                                    <th>{{$lang->getDataTable()[$lang->language]['AllNamesLanguage'][$myNameLang]}}</th>
                                    <th>{{$items}}</th>
                                    @include('all_model.table_array', ['idModel'=>'editModel'.$index, 'title'=>$lang->title3, 'idForm'=>'editForm'.$index, 'button'=>$lang->button3, 'action'=>route('edit.editAllLanguage', ['lang'=>$myNameLang, 'id'=>$key, 'name'=>$key2])])
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                @endforeach
            
            @else
                @foreach($lang->getDataTable() as $key=>$items)
                    @if(is_array($items))
                        @foreach($items as $key3=>$item)
                            <tr>
                                <th>{{$index++}}</th>
                                <th>{{$item}}</th>
                                @include('all_model.menu_array', ['idModel'=>'editModel'.$index, 'title'=>$lang->title3, 'idForm'=>'editForm'.$index, 'button'=>$lang->button3, 'action'=>route('edit.editAllLanguage', ['lang'=>request()->route('lang'), 'id'=>request()->route('id'), 'name'=>$key, 'item'=>$key3])])
                            </tr>
                        @endforeach
                    @elseif(request()->route('id') === 'Html')
                        <tr>
                            <th>{{$index++}}</th>
                            <th>{{$items}}</th>
                            @include('all_model.direction', ['idForm'=>'editForm'.$index, 'idModel'=>'editModel'.$index, 'title'=>$lang->model2, 'button'=>$lang->button2, 'action'=>route('edit.editAllLanguage', ['lang'=>request()->route('lang'), 'id'=>request()->route('id'), 'name'=>$key])])
                            
                        </tr>
                    @else
                        <tr>
                            <th>{{$index++}}</th>
                            <th>{{$items}}</th>
                            @include('all_model.table_array', ['idModel'=>'editModel'.$index, 'title'=>$lang->title3, 'idForm'=>'editForm'.$index, 'button'=>$lang->button3, 'action'=>route('edit.editAllLanguage', ['lang'=>request()->route('lang'), 'id'=>request()->route('id'), 'name'=>$key])])                            
                        </tr>
                    @endif
                @endforeach
            @endif
        </tbody>       
        <tfoot>
            <tr>
                <th>{{$lang->table7}}</th>
                @if(!request()->route('lang') && !request()->route('id'))
                <th>{{$lang->table10}}</th>
                @endif
                <th>{{$lang->LanguageValue}}</th>
                <th>{{$lang->table11}}</th>
            </tr>
        </tfoot>
        </table>
</div>
<script type="text/javascript">
    let setting = @json(!request()->route('lang') && !request()->route('id')) ? [
                { 'searchable': true },
                { 'searchable': false },
                { 'searchable': true },
                { 'searchable': false }
            ]:
            [
                { 'searchable': true },
                { 'searchable': true },
                { 'searchable': false }
            ]
    function displayEditForm(id, inputValue, value){
        removeClass(id);
        openForm(id);
        inputValue.val(value);
    }
    function displayEditForm2(id, selectBox, value){
        openForm(id);
        selectBox.each(function(){
            if($(this).val() == value)
                $(this).prop('selected', true);
        });
}
</script>
@endsection