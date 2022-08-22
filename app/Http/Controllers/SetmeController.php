<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Disciplina;
use App\Models\Ensino;
use Illuminate\Http\Request;

class SetmeController extends Controller
{
    //

    public function CandidatoProfessor(){
        $ensino= new Ensino();
        $ensinos= $ensino->get();


       return view ('register.candidato.register_candidato_professor', compact('ensinos'));

    }

    public function disciplina(Request $request){
        $ensino= new Disciplina();
        $ensinos= $ensino->where('id','=',$request->id)->get();
        if ($ensinos->count()>=1) {
            echo json_encode($ensinos);
            # code...
        }
        else{
            echo 'NOT FOUND';
        }

    }

}



