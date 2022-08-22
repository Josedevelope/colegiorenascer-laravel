<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato_Professor extends Model
{
    use HasFactory;

    public function setcv_fileAttribute($value){
        if ($this->attributes['other_files']==null) {
            $this->attributes['other_files']=$value;
            # code...
        };
    }
}
