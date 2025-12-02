</div>
<div class="modal-footer">
  <button type="submit" id="click_button" class="btn btn-primary" @if(isset($idForm))onclick="validForm('#{{$idForm}}')"@endif>{{$button}}</button>
</div>
</form>
    </div>
  </div>
</div>