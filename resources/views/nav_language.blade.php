@include('start_nav')
            @foreach ($lang->myMenuApp->getMenu() as $key=>$item)
              @if($key === 'CustomMenu')
                @foreach(array_reverse($item) as $key2 => $myValue)
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{$key2 === request()->route('lang')?'my_active':''}}"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="style_icon_menu" src="{{asset('/lib/icons/spellcheck.svg')}}"/>
                    {{$myValue->Name}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                    @foreach($myValue->Item as $keyItem=>$customItem)
                    <li>
                      <a class="dropdown-item {{$keyItem === request()->route('id') ? 'my_active':''}}" href="{{route('SystemLang', ['id'=>$keyItem, 'lang'=>$key2])}}">
                        <img class="style_icon_menu" src="{{asset('/lib/icons/'.$lang->myMenuApp->getIconByKey($keyItem))}}"/>
                        {{$customItem}}
                      </a>
                    </li>
                    @endforeach
                    </ul>
                  </li>
                @endforeach
              @else
                <li class="nav-item">
                  <a class="nav-link {{isset($active)&&$key === $active?'my_active':''}}" aria-current="page" href="{{route($key)}}">
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