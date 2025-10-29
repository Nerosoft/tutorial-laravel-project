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
    @yield('containt')
</body>
</html>
