<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
//use App\Http\Controllers\apiUsers;
class UserApi extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
        'id'=>$this->id,
        'name'=>$this->name,
        'email'=>$this->email,
        'adress'=>$this->adress,
        'phone'=>$this->phone,
            
        ];
    }
}
