<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">{{$lang->label2}}</a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{route('logout')}}">{{$lang->label1}}</a>
      </li>
    </ul>
    <div class="dropdown">
      <a class="btn btn-danger dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{$lang->selectBox3}}
      </a>
      <ul class="dropdown-menu">        
      @foreach($lang->MyBranch as $index=>$branch)
      <form class="form_branch" method="POST" action="{{ route('branchMain') }}">
        @csrf
         @include('my_id')
        <li class="dropdown-item">
            <button type="submit" class="{{request()->session()->get('userId') === $index? 'btn btn-danger' : 'btn btn-primary'}}">{{$branch->getName()}}</button>
        </li>
      </form>
      @endforeach
      </ul>
  </div>
  <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">{{$lang->title101}}</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            