@include('start_layout')
  <link rel='stylesheet' href="{{asset('css/login.css')}}">
</head>
<body>
     <div id="toastContainer" style="position: fixed; top: 0px; right: 10px; z-index: 9999; max-height: 90vh; overflow-y: auto;"></div>
    @if ($errors->any())
        <script>
            $(document).ready(function () {
                @json($errors->all()).forEach((text) => createToast(text, 'danger'));
            });
        </script>
    @elseif(session('success'))
        <script>
            $(document).ready(function () {
                createToast(@json(session('success')), 'success');
            });
        </script>
    @endif
    <div class="container">
    <div class="login">
        <form id='login' method='POST' action="{{$action}}">
           @csrf
            <input type="hidden" value="{{$lang->myAppId}}" name="id">
            <h4>{{$lang->label4}}</h4>
            <div class="form-group">
                <label for="email">{{$lang->label2}}</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{old('email')}}" placeholder="{{$lang->hint1}}"
                    title="{{$lang->hint1}}"
                    required 
                    oninvalid="IsEmail(this, '{{$lang->errorUserEmailRequired}}', '{{$lang->errorUserEmail}}')"
                    oninput="IsEmail(this, '{{$lang->errorUserEmailRequired}}', '{{$lang->errorUserEmail}}')">
            </div>
            <div class="form-group">
                <label for="password">{{$lang->label3}}</label>
                <input type="password" class="form-control" value="{{old('password')}}" id="password" name="password"
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
                <button type="button" onClick="closeModel('{{ $lang->language }}', '#exampleModal')" class="btn btn-dark">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="myForm" action="{{route('makeChangeLanguage')}}" method="POST">
                @csrf
                <input type="hidden" value="{{$lang->myAppId}}" name="userAdmin">
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
<script src="{{asset('js/login.js')}}" type="text/javascript"></script>
</body>
</html>
