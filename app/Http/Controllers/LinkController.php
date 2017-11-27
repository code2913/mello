<?php

namespace App\Http\Controllers;

use App\Link;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Charts;
use DB;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        $mylinks = Link::where('user_id', '=', Auth::id())->paginate(15);
        return view('link.index',compact('mylinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('link.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $code = str_random(6);
    $link = new Link(array('link' => $request->link,'code'=>$code));
    $user = User::find(Auth::id());
    $link = $user->link()->save($link);
    return back()->with(compact('code'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show($link)
    {
        $links = Link::find($link)->visitors();
        $chart = Charts::database(DB::table('visitors')->where('link_id',$link)->get(), 'line', 'chartjs')->lastByDay(20)->dateFormat('')->title('Monthly Link View')->elementLabel('Visitors');

        return view('link.stats',compact('links','chart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        //
    }
}
