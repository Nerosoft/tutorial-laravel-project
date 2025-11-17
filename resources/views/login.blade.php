@include('start_layout')
  <link rel='stylesheet' href="{{asset('css/login.css')}}">
</head>
<body>
    @if ($errors->any())
        @section('toast')
        @foreach($errors->all() as $key=>$toast)
        @include('toast_message', ['type'=>'danger'])
        @endforeach
        @endsection
        @include('toastContainer')
    @elseif(session('success'))
        @section('toast')
        @include('toast_message', ['type'=>'success','key'=>'toastId', 'toast'=>session('success')])
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
        <button type="button" onClick="openForm('#createModel')" class="btn btn-success">{{$lang->button1}}</button>
        <!-- Modal -->
        @include('all_model.start_model', [
            'title'=>$lang->label1, 
            'action'=>route('makeChangeLanguage')])
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
        @include('all_model.end_model', ['button'=>$lang->button2])


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
        closeForm('#createModel');
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
