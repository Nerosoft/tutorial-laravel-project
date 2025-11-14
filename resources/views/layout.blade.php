@include('start_layout')
<link href="{{asset('lib/dataTables.bootstrap5.css')}}" rel="stylesheet">
<script src="{{asset('lib/dataTables.js')}}" type="text/javascript"></script>
<script src="{{asset('lib/dataTables.bootstrap5.js')}}" type="text/javascript"></script>
</head>
<body>
  @if ($errors->any())
    <div id="toastContainer" style="position: fixed; top: 0px; right: 10px; z-index: 9999; max-height: 90vh; overflow-y: auto;">
        @foreach($errors->all() as $key=>$toast)
            @include('toastContainer', ['type'=>'danger'])   
        @endforeach
    </div>
  @elseif(session('success'))
     <div id="toastContainer" style="position: fixed; top: 0px; right: 10px; z-index: 9999; max-height: 90vh; overflow-y: auto;">
        @include('toastContainer', ['type'=>'success','key'=>'toastId', 'toast'=>session('success')])
    </div>
  @elseif(isset($lang->successfully1))
    <div id="toastContainer" style="position: fixed; top: 0px; right: 10px; z-index: 9999; max-height: 90vh; overflow-y: auto;">
        @include('toastContainer', ['type'=>'success','key'=>'toastId', 'toast'=>$lang->successfully1])
    </div>
  @endif
  @yield('containt')
</body>
</html>
