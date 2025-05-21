<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes; // Naudojame SoftDeletes trait 05-21
    protected $fillable = ['name', 'phone', 'email'];
    protected $dates = ['deleted_at']; // Nurodome, kad tai data 05-21
}
