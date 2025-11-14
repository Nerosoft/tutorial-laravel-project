 <div id="{{$key}}" class="toast align-items-center text-bg-{{$type}} border-0 mt-2" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
        <div class="toast-body">{{ $toast }}</div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>
 <script>
   
    (new bootstrap.Toast(
         $('#'+@json($key)).on("hidden.bs.toast", function () {
        $(this).remove();
    })
        
        , { delay: 10000 })).show();
</script>
