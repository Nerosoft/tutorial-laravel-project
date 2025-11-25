@include('start_layout')
<link href="{{asset('lib/dataTables.bootstrap5.css')}}" rel="stylesheet">
<script src="{{asset('lib/dataTables.js')}}" type="text/javascript"></script>
<script src="{{asset('lib/dataTables.bootstrap5.js')}}" type="text/javascript"></script>
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
  @elseif(isset($lang->successfully1))
    @section('toast')
    @include('toast_message', ['type'=>'success','key'=>'toastId', 'toast'=>$lang->successfully1])
    @endsection
    @include('toastContainer')
  @endif
  @yield('containt')
</body>
</html>
