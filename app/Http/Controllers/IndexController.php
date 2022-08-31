<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataCompany;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function login()
    {
        return view('login');
    }

    public function regis()
    {
        return view('regis');
    }

    public function tender()
    {
        return view('tender');
    }

    public function contact()
    {
        return view('contact');
    }


    public function activity()
    {
        return view('activity');
    }

    public function news()
    {
        return view('news');
    }

    public function biodata($id)
    {
        $data = DataCompany::findOrFail($id);
        return view('biodata', compact('data'));
    }

    public function dokumen($id)
    {
        $data = DataCompany::findOrFail($id);
        return view('dokumen',compact('data'));
    }
    
    public function create()
    {
        //
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
