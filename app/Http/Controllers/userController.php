<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $all_users=User::all();
        return view('users',compact('all_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$this->validate(request(),[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'adress'=>'required',
            
        ]);
        User::create([
        
            'name'=>request('name'),
            'email'=>request('email'),
            'phone'=>request('phone'),
            'adress'=>request('adress'),

        ]);
        return redirect('/welcome');

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
        $user_data=User::find($id)->get()->first();
        return view('edit',compact('user_data'));
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
        $new_data=User::find($id)->update([
            
            'name'=>request('name'),
            'email'=>request('email'),
            'phone'=>request('phone'),
            'adress'=>request('adress'),

        ]);
        return redirect('/welcome');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return back();
    }
}
