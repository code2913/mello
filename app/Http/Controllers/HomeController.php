<?php

namespace App\Http\Controllers;
use App\Link;
use App\User;
use App\Visitor;
use Auth;
use Illuminate\Http\Request;
use Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    // add authorizatio to controller;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $linkVisit = Visitor::where('user_id',Auth::id())->count();
          $link = User::find(Auth::id());
          $linkCOunt = $link->link->count();
          return view('home',compact('linkCOunt','linkVisit'));

      }
    }
