<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Validator;
use App\Advert;

class Advertcontroller extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $advert = Advert::get();
    return view('admin.advert.index')->with(compact('advert'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('admin.advert.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
         'title'=>'required|max:12',
         'description'=>'required',
         'advert'=>'required|image:jpg,png|max:5000',
      ]);
      if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
      }
      else{
        $imageName = time().'.'.$request->advert->getClientOriginalExtension();
        $request->advert->move(public_path('advert'), $imageName);
        $advert = new Advert;
        $advert->name = $request->title;
        $advert->description = $request->description;
        $advert->file = $imageName;
        $advert->save();

      }
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $advert = Advert::findOrFail($id);
    return view('advert.preview')->with(compact('advert'));
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
