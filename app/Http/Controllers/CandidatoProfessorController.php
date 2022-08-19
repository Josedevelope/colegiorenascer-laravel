<?php



namespace App\Http\Controllers;

use App\Models\Candidato_Professor;
use Illuminate\Http\Request;

class CandidatoProfessorController extends Controller
{
    //


    public function storage(Request $request){
       //var_dump($resquest->file('cv_file'), $resquest->all());
    //   $resquest->file('cv_file')->storage("teste");
   /*  $resquest->file('cv_file')->store("candidato/".$resquest->nome);
       var_dump( $resquest->file('cv_file')); */

       if($request)
    {
        $prof_candidate= new Candidato_Professor();
        $prof_candidate->nome=$request->nome;
        $prof_candidate->bi=$request->bi;
        $prof_candidate->telemovel=$request->telemovel;
        $prof_candidate->cv_file= $request->file('cv_file')->store("candidato");
        $prof_candidate->other_files=$request->file('other_files')->store("candidato");
       $response= $prof_candidate->save();
       var_dump($response); 
    }

    }
}
