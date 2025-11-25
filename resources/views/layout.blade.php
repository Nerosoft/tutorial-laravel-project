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
  @if(Route::currentRouteName() !== 'Home')
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        new DataTable('#example',{
            "oLanguage": {
                "sSearch": @json($lang->table1),
                "sEmptyTable":  @json($lang->table3)
            },
            "language": {
                "lengthMenu": "_MENU_ " + @json($lang->table5),
                "info":  @json($lang->table4) + " _MAX_",
                "zeroRecords":  @json($lang->table3),
                "infoEmpty": @json($lang->table2),
                "infoFiltered": @json($lang->table6) + " _END_ --- _TOTAL_"
            },
            pageLength : 10,
            lengthMenu: [[10, 20, -1], [10, 20, 'All']],
            filter: true,
            deferRender: true,
            scrollY: '67vh',
            scrollCollapse: true,
            scroller: true,
            columns: setting
        });
    });  
</script>
  @endif
</body>
</html>
