<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\UserApi as UserApiResource;
use App\User;

class apiUsers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                $all_users=User::all();
                return UserApiResource::collection($all_users);

    }
    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
        $user=User::find($id);
        return new UserApiResource($user);
        
        
    }

    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate=Validator::make(request()->all(),[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'adress'=>'required',
            
        ]);

            if($validate->fails()){
                
                return response(['status'=>false,'message'=>$validate->messages()]);
            }else{
                
        User::create([
        
            'name'=>request('name'),
            'email'=>request('email'),
            'phone'=>request('phone'),
            'adress'=>request('adress'),

        ]);
        return response(['status'=>true,'message'=>'registration is done sucssfully']);
       }

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

        if($new_data){
            return response(['status'=>true,'message'=>'information updated sucssfully']);
        }else{
             return response(['status'=>false,'message'=>'information not valid']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        if($user->delete()){
            
            return response(['status'=>true,'message'=>'user deleted sucssfully']);

        }else{
            return response(['status'=>false,'message'=>'user is not deleted']);
            
        }
    }
}
