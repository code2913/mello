<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advert;
use  Auth;
use Carbon\Carbon;

use App\Campaign;


class CampaignController extends Controller
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
      $advert = Campaign::where('user_id',Auth::id())->get();
        return view('campaign.index')->with(compact('advert'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // check if your ads are available;
      $advert = Advert::get();
        return view('campaign.create')->with(compact('advert'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
      Carbon::parse($request->start),
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $campaign = New Campaign;
      $campaign->name = $request->name;
      $campaign->budget = $request->budget;
      $campaign->start_date = Carbon::parse($request->start);
      $campaign->end_date = Carbon::parse($request->end);
      $campaign->user_id = Auth::id();
      $campaign->advert_id = $request->advert;
      $campaign->timestamps = false;
      $campaign->save();


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
