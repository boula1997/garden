<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\MorphOne;



class Service extends Model implements TranslatableContract
{
    use HasFactory, Translatable;
    protected $table = 'services';
    public $translatedAttributes = ['title', 'subtitle', 'description'];
    protected $guarded = [];
    public $timestamps = true;

    public function file(): MorphOne
    {
        return $this->morphOne(File::class, 'fileable');
    }
    
}
