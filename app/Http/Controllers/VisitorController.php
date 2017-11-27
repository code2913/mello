<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use App\Link;

class VisitorController extends Controller
{
    public function index($code)
    {
      $agent = new Agent();
      $ip = \Request::ip();
      $visitor = geoip()->getLocation(\Request::ip());
      $link = Link::where('code',$code)->first();
      $link->visitors()->create([
                    'visitor' => $visitor->ip,
                    'location' => $visitor->city,
                    'country' => $visitor->country,
                    'device' =>$agent->platform(),
                    'visits' => 0,
                    'user_id'=>$link->user_id
                ]);


      return view('advert')->with(compact('link'));
    }
}
