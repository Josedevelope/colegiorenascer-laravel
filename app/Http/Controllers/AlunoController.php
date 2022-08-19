<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    //




    public function register()
    {
        $Aluno= new Aluno();
        $Aluno->nome="Jose";
        $Aluno->bi_cedula="006889653LA047";
        $Aluno->morada="Bairro Azul";
        $Aluno->file_transeferencia="09847648";
        $Aluno->classe_id=1;
        $Aluno->save();
        dd($Aluno);





    }
}


