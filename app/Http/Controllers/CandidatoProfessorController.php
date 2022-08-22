<?php



namespace App\Http\Controllers;

use App\Models\Candidato_Professor;
use App\Models\testando;
use Illuminate\Http\Request;

class CandidatoProfessorController extends Controller
{
    //


    public function storage(Request $request){
       //var_dump($resquest->file('cv_file'), $resquest->all());
    //   $resquest->file('cv_file')->storage("teste");
   /*  $resquest->file('cv_file')->store("candidato/".$resquest->nome);
       var_dump( $resquest->file('cv_file')); */

       $validator=validator($request->all(),['file'=>['required','mimes:png,jpg,jpeg,pdf','max=2048']]);

       if(!$validator->fails())
       {
            $resultado['result']=false;
            $resultado['message']="O formato ou tamanho do ficheiro inválido!";

            echo json_encode($resultado);
            return;

       }
       else{

            $prof_candidate= new Candidato_Professor();
            $prof_candidate->nome=$request->nome;
            $prof_candidate->bi=$request->bi;
            $prof_candidate->telemovel=$request->telemovel;
            $prof_candidate->ensino_id=$request->ensino;
            $prof_candidate->disciplina_id=$request->disciplina;

            if ($request->file('cvfile')!=null) {
                # code...
                $prof_candidate->cv_file= $request->file('cvfile')->store("mydocument");
                if ($request->file('other_files')!=null) {
                    $prof_candidate->other_files=$request->file('other_files')->store("candidato");
                    # code...
                }
                else {
                    $prof_candidate->other_files="Não foi enviado";
                    # code...
                }
                //
            }
            else{
                $resultado['result']=false;
                $resultado['message']="O CV deve ser inserido!";
               echo json_encode($resultado);

                        return;
            }

           //
           if ($prof_candidate->where('bi','=',$request->bi)->get()->count()>0) {
            # code...
            $response= $prof_candidate->update();

           }
           else{
            $response= $prof_candidate->save();
             }

           if ($response) {
            # code...
            $resultado['result']=true;
            $resultado['message']="A sua candidatura foi efectuada com sucesso!";
           echo json_encode($resultado);

                    return;
           }
           else{
            $resultado['result']=false;
            $resultado['message']="Erro na candidatura!";
            echo json_encode($resultado);

                    return;
           }

       }



    }
}
