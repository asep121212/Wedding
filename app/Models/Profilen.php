<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profilen extends Model
{
    use HasFactory;
    protected $fillable = ['username_pria','username_wanita','user_pria','user_wanita','user_bapak_wanita','user_ibu_wanita','user_bapak_pria','user_ibu_pria'];

}