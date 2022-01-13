<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['conversation_id', 'message', 'sent_user', 'recieved_user', 'name', 'email', 'phone', 'description'];

    public function conversation()
    {
        return $this->belongsTo('App\Models\Conversation')->withDefault(function ($data) {
            foreach ($data->getFillable() as $dt) {
                $data[$dt] = __('Deleted');
            }
        });
    }

//    public function user()
//    {
//        return $this->belongsTo('App\Models\User','sent_user');
//
//    }
}
