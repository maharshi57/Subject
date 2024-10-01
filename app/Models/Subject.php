<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Subject extends Model
{
    use HasFactory,HasApiTokens;

    protected $table = 'subjects';
    protected $ptimarykey = "id";
    protected $gaurded = [];
    protected $fillable = [ 'name', 'subject_code','color'];

    // public function setColorAttribute($value){
    //     $this->attributes['color'] = toString("#".$value);
    //     }
}
