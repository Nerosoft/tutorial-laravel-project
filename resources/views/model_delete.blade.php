<!-- Model delete -->
 <img class="style_icon_menu pointer" src="{{asset('/lib/icons/trash3.svg')}}" onclick="openForm('#deleteModel{{$index}}')"/>
<div class="modal" id="deleteModel{{$index}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $lang->titleModelDelete }}</h5>
                <button type="button" onclick="closeForm('#deleteModel{{$index}}')" class="btn btn-dark">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="deleteForm{{$index}}" action="{{ $lang->actionDelete }}" method="POST">
                    {{ $lang->messageModelDelete }}<spam>-{{ $name }}</spam>
                    @csrf
                    @include('my_id', ['myAppId'=>$index])
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="deleteForm{{$index}}" class="btn btn-danger">{{ $lang->buttonModelDelete }}</button>
            </div>
        </div>
    </div>
</div>
