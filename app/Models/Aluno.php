<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{

    public function setNomeAttribute($value){
        $this->attributes['nome']="amor";
    }
 /*    protected $casts = [
        'date_belog_to_us' => 'datetime',
    ];
 */
    use HasFactory;


}
