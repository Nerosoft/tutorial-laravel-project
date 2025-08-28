<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">{{$lang->label2}}</a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{route('logout')}}">{{$lang->label1}}</a>
      </li>
    </ul>
 



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
            @foreach ($lang->myMenuApp->getMenu() as $key=>$item)
            @if($key === 'CustomMenu' && isset($active) && isset($activeItem))
                @foreach(array_reverse($item) as $key2 => $myValue)
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{$key2 === $active?'my_active':''}}"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="style_icon_menu" src="{{asset('/lib/icons/spellcheck.svg')}}"/><i class="{{$key2 === $active?'my_active':''}}" style="font-size: 1.3rem; color: cornflowerblue;"></i>
                    {{$myValue->Name}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                    @foreach($myValue->Item as $keyItem=>$customItem)
                    <li>
                      <a class="dropdown-item" href="{{route('SystemLang', ['id'=>$keyItem, 'lang'=>$key2])}}">
                        <img class="style_icon_menu" src="{{asset('/lib/icons/'.$lang->myMenuApp->getIconByKey($keyItem))}}"/>
                        <test class="{{$keyItem === $activeItem && $key2 === $active ? 'my_active':''}}">{{$customItem}}</test>
                      </a>
                    </li>
                    @endforeach
                    </ul>
                  </li>
                @endforeach
              @elseif($key === 'CustomMenu')
                @foreach(array_reverse($item) as $key2 => $myValue)
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{$key2 === $active?'my_active':''}}"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="style_icon_menu" src="{{asset('/lib/icons/spellcheck.svg')}}"/><i class="{{$key2 === $active?'my_active':''}}" style="font-size: 1.3rem; color: cornflowerblue;"></i>
                    {{$myValue->Name}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                    @foreach($myValue->Item as $keyItem=>$customItem)
                    <li>
                      <a class="dropdown-item" href="{{route('SystemLang', ['id'=>$keyItem, 'lang'=>$key2])}}">
                        <img class="style_icon_menu" src="{{asset('/lib/icons/'.$lang->myMenuApp->getIconByKey($keyItem))}}"/>
                        <test>{{$customItem}}</test>
                      </a>
                    </li>
                    @endforeach
                    </ul>
                  </li>
                @endforeach
              @elseif(isset($item->Item) && isset($active) && isset($activeItem))
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle {{$key === $active?'my_active':''}}"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img class="style_icon_menu" src="{{asset('/lib/icons/'.$lang->myMenuApp->getIconByKey($key))}}"/><i class="{{$key === $active?'my_active':''}}" style="font-size: 1.3rem; color: cornflowerblue;"></i>
                  {{$item->Name}}
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark">
                  @foreach ($item->Item as $keyItem=>$myItem)
                  <li>
                    <a class="dropdown-item" href="{{route($key, $keyItem)}}">
                      <img class="style_icon_menu" src="{{asset('/lib/icons/'.$lang->myMenuApp->getIconByKey($keyItem))}}"/>
                      <test class="{{$keyItem === $activeItem ? 'my_active':''}}">{{$myItem}}</test>
                    </a>
                  </li>
                  @endforeach
                  </ul>
                </li>
              @elseif(isset($item->Item))
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img class="style_icon_menu" src="{{asset('/lib/icons/'.$lang->myMenuApp->getIconByKey($key))}}"/><i class=" style="font-size: 1.3rem; color: cornflowerblue;"></i>
                  {{$item->Name}}
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark">
                  @foreach ($item->Item as $keyItem=>$myItem)
                  <li>
                    <a class="dropdown-item" href="{{route($key, $keyItem)}}">
                      <img class="style_icon_menu" src="{{asset('/lib/icons/'.$lang->myMenuApp->getIconByKey($keyItem))}}"/>
                      {{$myItem}}
                    </a>
                  </li>
                  @endforeach
                  </ul>
                </li>
              @else
                <li class="nav-item">
                  <a class="nav-link {{$key === $active?'my_active':''}}" aria-current="page" href="{{route($key)}}">
                  <img class="style_icon_menu" src="{{asset('/lib/icons/'.$lang->myMenuApp->getIconByKey($key))}}"/><i class="{{$key === $active?'my_active':''}}" style="font-size: 1.3rem; color: cornflowerblue;"></i>
                  {{$item}}
                  </a>
                </li>
              @endif
            @endforeach   
        </ul>
      </div>

     
    </div>



  </div>
</nav>