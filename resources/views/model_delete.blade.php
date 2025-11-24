<img class="style_icon_menu pointer" src="{{asset('/lib/icons/trash3.svg')}}" onclick="openForm('#deleteModel{{$index}}')"/>
@include('all_model.start_model', ['title'=>$lang->titleModelDelete, 'idModel'=>'deleteModel'.$index, 'idForm'=>'deleteForm'.$index])
{{ $lang->messageModelDelete }}<spam>-{{ $name }}</spam>
@csrf
@include('my_id')
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" form="deleteForm{{$index}}" class="btn btn-primary">{{$lang->buttonModelDelete}}</button>
      </div>
    </div>
  </div>
</div>