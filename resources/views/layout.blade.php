<!DOCTYPE html>
<html lang="en" dir="{{$lang->direction}}">
<head>
  <meta charset="UTF-8">
  <title>{{$lang->title}}</title>
  @yield('head')
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  <link href="{{asset('lib/bootstrap.min.css')}}" rel="stylesheet">

  <link href="{{asset('lib/dataTables.bootstrap5.css')}}" rel="stylesheet">
  
  <script src="{{asset('lib/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('lib/bootstrap.bundle.min.js')}}" type="text/javascript"></script>

  <script src="{{asset('lib/dataTables.js')}}" type="text/javascript"></script>
  <script src="{{asset('lib/dataTables.bootstrap5.js')}}" type="text/javascript"></script>

  <script src="{{asset('js/js.js')}}" type="text/javascript"></script>
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
  @elseif(isset($lang->successfully1))
      <script>
          $(document).ready(function () {
              createToast(@json($lang->successfully1), 'success');
          });
      </script>
  @endif
  @yield('containt')
</body>
</html>
