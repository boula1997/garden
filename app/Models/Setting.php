<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['logo','tab','address','map','title','image','facebook','twitter','youtube','tiktok','instgram','phone1','phone2','phone3','email1','email2','appointment1','appointment2'];

}
