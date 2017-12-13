<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Link;
use App\Visitor;
use Charts;
use DB;
use Auth;
use Gate;

class AdminController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $users = User::count();
    $link = Link::count();
    $visitor = Visitor::count();
    $chart = Charts::database(DB::table('visitors')->get(), 'line', 'highcharts')->lastByDay(20)->title('Monthly Link View')->elementLabel('Visitors');

    $roles = User::find(Auth::id())->roles()->orderBy('name')->get();
    if(empty($roles)){
      return redirect('home');
    }
    foreach ($roles as $roles) {
      if (Gate::allows('admin_only', $roles)) {
        return view('admin.index')->with(compact('users','link','visitor','chart'));
      }
      else {
        return redirect('home');
      }
    }
  }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
      $users = User::paginate(25);
      return view('admin.create')->with(compact('users'));

    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
      //
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
      //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
      //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
      //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
      //
    }
  }
