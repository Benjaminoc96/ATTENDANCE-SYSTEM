<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Purpose extends Model
{
    use HasApiTokens, HasFactory, Notifiable,  SoftDeletes;

    protected $table = 'purposes';


    protected $guarded = [];



    static function findById($id){
        $user = self::where('id', $id)->first();
        if(!$user){
     
        return abort(404, "New Visit Purpose Not Found");
            
        }
        return $user;
    }
    
}
