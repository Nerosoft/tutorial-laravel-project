@include('start_nav')
            @foreach ($lang->myMenuApp->getMenu() as $key=>$item)
              @if(isset($item->Item))
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle {{Route::currentRouteName() === $key ? 'my_active' : ''}}"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img class="style_icon_menu" src="{{asset('/lib/icons/'.$lang->myMenuApp->getIconByKey($key))}}"/>
                  {{$item->Name}}
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark">
                  @foreach ($item->Item as $keyItem=>$myItem)
                  <li>
                    <a class="dropdown-item {{$keyItem === request()->route('id')?'my_active':''}}" href="{{$key === 'CustomMenu'?route('SystemLang', ['id'=>$keyItem, 'lang'=>$key2]):route($key, $keyItem)}}">
                      <img class="style_icon_menu" src="{{asset('/lib/icons/'.$lang->myMenuApp->getIconByKey($keyItem))}}"/>
                      {{$myItem}}
                    </a>
                  </li>
                  @endforeach
                  </ul>
                </li>
              @else
                <li class="nav-item">
                  <a class="nav-link {{$key === Route::currentRouteName()?'my_active':''}}" aria-current="page" href="{{route($key)}}">
                  <img class="style_icon_menu" src="{{asset('/lib/icons/'.$lang->myMenuApp->getIconByKey($key))}}"/>
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