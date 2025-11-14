@include('start_layout')
  <link rel='stylesheet' href="{{asset('css/login.css')}}">
</head>
<body>
    @if ($errors->any())
    @section('toast')
        @foreach($errors->all() as $key=>$toast)
            <div id="{{$key}}" class="toast align-items-center text-bg-danger border-0 mt-2" role="alert" aria-live="assertive" aria-atomic="true">
                <script>(new bootstrap.Toast($('#'+@json($key)).on("hidden.bs.toast", function () {$(this).remove();}), { delay: 10000 })).show();</script>
                <div class="d-flex">
                    <div class="toast-body">{{$toast}}</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endforeach
    @endsection
    @include('toastContainer')
    </div>
    @elseif(session('success'))
    @section('toast')
    <div id="toastMessage" class="toast align-items-center text-bg-success border-0 mt-2" role="alert" aria-live="assertive" aria-atomic="true">
        <script>(new bootstrap.Toast($('#toastMessage').on("hidden.bs.toast", function () {$(this).remove();}), { delay: 10000 })).show();</script>
        <div class="d-flex">
            <div class="toast-body">{{ session('success') }}</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    @endsection
    @include('toastContainer')
    @endif
<div class="container">
    <div class="login">
        <form id='login' method='POST' action="{{$action}}">
           @csrf
            @include('my_id2')
            <h4>{{$lang->label4}}</h4>
            <div class="form-group">
                <label for="email">{{$lang->label2}}</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{old('email')}}" placeholder="{{$lang->hint1}}"
                    title="{{$lang->hint1}}"
                    required 
                    >
            </div>
            <div class="form-group">
                <label for="password">{{$lang->label3}}</label>
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="{{$lang->hint2}}"
                    title="{{$lang->hint2}}"
                    minlength="8" 
                    required 
                    oninvalid="handleInput(this ,'{{$lang->errorUserPasswordRequired}}', '{{$lang->errorUserPassword}}')"
                    oninput="handleInput(this ,'{{$lang->errorUserPasswordRequired}}', '{{$lang->errorUserPassword}}')">
            </div>
            @yield('containt')
        </form>
        <button form='login' type='submit' class="btn btn-primary" onclick="validForm('#login')">{{$lang->button3}}</button>
        <button type="button" onClick="openForm('#exampleModal')" class="btn btn-success">{{$lang->button1}}</button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="SettingLanguage">{{$lang->label1}}</h5>
                        <button type="button" id="close_button" class="btn btn-dark">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="myForm" action="{{route('makeChangeLanguage')}}" method="POST">
                        @csrf
                        @include('my_id2')
                        @foreach ($lang->myRadios as $key =>$radios)
                            <div class="form-check">
                            <input name="id" class="flexCheck form-check-input" value="{{$key}}" onClick="setLanguage(this.value)" {{$key === $lang->language ? 'checked' : ''}} type="checkbox">
                            <label  class="form-check-label">
                            {{$radios->getName()}}
                            </label>
                            </div>
                        @endforeach
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" form="myForm" class="btn btn-primary">{{$lang->button2}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#email').on('input invalid', function() {
        if (this.validity.valueMissing)
            this.setCustomValidity(@json($lang->errorUserEmailRequired));
        else if (this.validity.typeMismatch)
            this.setCustomValidity(@json($lang->errorUserEmail));
        else
            this.setCustomValidity('');
    });
    $('#close_button').on('click', function() {
        closeForm('#exampleModal');
        if($('.flexCheck:checked').val() !== @json($lang->language))
            setLanguage(@json($lang->language));
    });
    function setLanguage(element){
        $('.flexCheck').each(function(idx, el){
            el.checked = element == el.value;
        });
    }

</script>
</body>
</html>
