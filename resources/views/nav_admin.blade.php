@extends('start_nav')
@section('menu')
  @foreach ($lang->myMenuApp as $key=>$item)
    @if(is_array($item))
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{$key === request()->route('lang') || Route::currentRouteName() === $key ? 'my_active' : ''}}"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img class="style_icon_menu" src="{{asset('/lib/icons/'.$lang->getIconByKey($key))}}"/>
        {{array_shift($item)}}
        </a>
        <ul class="dropdown-menu dropdown-menu-dark">
        @foreach ($item as $keyItem=>$myItem)
        <li>
          <a class="dropdown-item {{$key === request()->route('lang') && $keyItem === request()->route('id') || $keyItem === request()->route('id') && Route::currentRouteName() !== 'SystemLang'?'my_active':''}}" href="{{Route::currentRouteName() === 'SystemLang'?route('SystemLang', ['id'=>$keyItem, 'lang'=>$key]):route($key, $keyItem)}}">
            <img class="style_icon_menu" src="{{asset('/lib/icons/'.$lang->getIconByKey($keyItem))}}"/>
            {{$myItem}}
          </a>
        </li>
        @endforeach
        </ul>
      </li>
    @else
      <li class="nav-item">
        <a class="nav-link {{!request()->route('lang') && !request()->route('id') && $key !== 'Home' &&  Route::currentRouteName() === 'SystemLang'|| $key === Route::currentRouteName() && Route::currentRouteName() !== 'SystemLang'?'my_active':''}}" aria-current="page" href="{{route($key)}}">
        <img class="style_icon_menu" src="{{asset('/lib/icons/'.$lang->getIconByKey($key))}}"/>
        {{$item}}
        </a>
      </li>
    @endif
  @endforeach  
@endsection 
