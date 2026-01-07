<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\mydb;
use Symfony\Component\HttpFoundation\Response;

class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $state): Response
    {
        if($request->session()->exists('userId') && $state === 'admin' 
        || $request->session()->exists('userId') && $state === 'test' && $request->route('id') === 'Test' 
        || $request->session()->exists('userId') && $state === 'test' && $request->route('id') === 'Cultures' 
        || $request->session()->exists('userId') && $state === 'test' && $request->route('id') === 'Packages'

        || $request->session()->exists('userId') && $state === 'delete' && $request->route('id') === 'Branches' 
        || $request->session()->exists('userId') && $state === 'delete' && $request->route('id') === 'Test' 
        || $request->session()->exists('userId') && $state === 'delete' && $request->route('id') === 'Cultures' 
        || $request->session()->exists('userId') && $state === 'delete' && $request->route('id') === 'Packages'
        || $request->session()->exists('userId') && $state === 'delete' && $this->getKeyTables()
    
        || $request->session()->exists('userId') && $state === 'flex' && isset(mydb::find(request()->session()->get('userId'))[mydb::find(request()->session()->get('userId'))['Setting']['Language']]['MyFlexTables']) && $this->getKeyTables()
        )
            return $next($request);
        else if($request->session()->exists('userId'))
            return redirect()->route('Home');
        else
            return redirect()->route('mylogin');
    }
    function getKeyTables(){
        return in_array(request()->route('id'), array_keys((array)mydb::find(request()->session()->get('userId'))[mydb::find(request()->session()->get('userId'))['Setting']['Language']]['MyFlexTables']));
    }
}
