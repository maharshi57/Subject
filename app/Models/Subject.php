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
    //         // Validate the hex code using a regular expression
    //     if (!preg_match('/^([A-Fa-f0-9]{6})$/', $value)) {
    //         // Handle invalid hex code (e.g., throw an exception or set a default value)
    //         throw new InvalidArgumentException('Invalid hex code format.');
    //     }
    //     $this->attributes['color'] = "#" . $value;
    // }
}
