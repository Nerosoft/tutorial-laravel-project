@include('start_layout')
<link href="{{asset('lib/dataTables.bootstrap5.css')}}" rel="stylesheet">
<script src="{{asset('lib/dataTables.js')}}" type="text/javascript"></script>
<script src="{{asset('lib/dataTables.bootstrap5.js')}}" type="text/javascript"></script>
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
  @elseif(isset($lang->successfully1))
    @section('toast')
    <div id="toastMessage" class="toast align-items-center text-bg-success border-0 mt-2" role="alert" aria-live="assertive" aria-atomic="true">
        <script>(new bootstrap.Toast($('#toastMessage').on("hidden.bs.toast", function () {$(this).remove();}), { delay: 10000 })).show();</script>
        <div class="d-flex">
            <div class="toast-body">{{ $lang->successfully1 }}</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    @endsection
    @include('toastContainer')
  @endif
  @yield('containt')
</body>
</html>
