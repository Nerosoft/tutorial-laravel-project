@include('start_layout')
<link href="{{asset('lib/dataTables.bootstrap5.css')}}" rel="stylesheet">
<script src="{{asset('lib/dataTables.js')}}" type="text/javascript"></script>
<script src="{{asset('lib/dataTables.bootstrap5.js')}}" type="text/javascript"></script>
</head>
<body>
  @if ($errors->any())
  @include('toastContainer')
      <script>
        @json($errors->all()).forEach((text) => createToast(text, 'danger'));
      </script>
  @elseif(session('success'))
    @include('toastContainer')
      <script>
        createToast(@json(session('success')), 'success');
      </script>
  @elseif(isset($lang->successfully1))
    @include('toastContainer')
      <script>
        createToast(@json($lang->successfully1), 'success');
      </script>
  @endif
  @yield('containt')
</body>
</html>
