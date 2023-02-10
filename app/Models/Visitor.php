<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visitor extends Model
{

    use SoftDeletes;
    use HasFactory;
    protected $table = 'visitors';
    protected $fillable = ['name', 'contact', 'address', 'department', 'staff','purpose', 'visitor_type', 'log_type'];




    static function findById($id){
        $visitor = self::where('id', $id)->first();
        if(!$visitor){
     
        return abort(404, "visitor Not Found");
            
        }
        return $visitor;
    }



}
