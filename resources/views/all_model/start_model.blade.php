<div class="modal fade" id="{{$idModel}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="SettingLanguage">{{$title}}</h5>
        <button type="button" id="close_button" onclick="closeForm('#{{$idModel}}')" class="btn btn-dark">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="{{$idForm}}" action="{{$action}}" method="POST">
          @csrf

         