<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'id'         => $this->id,
            'names'       => $this->names,
            'lastname'    =>$this->lastname,
            'email'     => $this->email,
            'phone' => $this->phone,
            'identification' => $this->identification,
        ];
    }
}
