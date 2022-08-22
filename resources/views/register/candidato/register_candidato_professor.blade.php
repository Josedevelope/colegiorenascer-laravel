@extends('layouts.app')

@section('content')


<!-- start banner Area -->
<section class="banner-area relative candidato-teacher-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Candidata-se !
                </h1>
                <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.html"> Contact Us</a></p>
            </div>
        </div>
    </div>
</section>


<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 candidato-teacher">
            <h4 class="candidato-title pb-10 pt-10 text-center mb-20">Submete aqui os seu dados</h4>
            <form  name="form_candidato_professors" action="{{route('candidato_professor.storage') }}" method="POST" enctype="multipart/form-data"  class="form-area contact-form mr-2 ml-2">
                @csrf
                <input type="text" name="nome" id="" class="form-control mb-10 input-teacher" placeholder="Nome Completo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nome Completo'" required aria-required="este campo é obrigatório">
                <input type="text" name="bi" id="" class="form-control mb-10 input-teacher" placeholder="Nº de bilhete Identidade" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nº de bilhete Identidade'" required aria-required="Este campo é obrigatório">
                <input type="tel" name="telemovel" id="" class="form-control mb-10 input-teacher" placeholder="Nº telemóvel" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nº telemóvel'" required>

                {{-- <div class="custom-file mb-10 input-teacher">
                    <input type="file" name="cvfile" class="custom-file-input form-control mb-10 input-teacher" id="cvfile" required aria-required="o cv é obrigatório">
                    <label class="custom-file-label input-teacher" for="cvfile" name="filecv" aria-describedby="cvfileAddon">CV (curriculum vitae)</label>

                </div> --}}

                {{-- <input type="file" name="cvfile" class="form-control form-control-lg mb-10 input-teacher form-control-file" aria-describedby="cv control">
 --}}
                {{-- <div class="custom-file mb-10 input-teacher">
                    <input type="file" name="other_files" class="custom-file-input form-control mb-10 input-teacher" id="other_files">
                    <label class="custom-file-label input-teacher" for="other_files" aria-describedby="other_filesAddon">Outros documentos (Opcional)</label>

                </div> --}}

                <div class="" id="service-select">
                    <select class="form-select form-select-lg mb-3 selecEnsino" name="ensino">
                        <option datd-display="">Seleccione Ensino / Curso: </option>

                        @foreach ($ensinos as $listaensino )
                        <option value="{{$idensinoselected=$listaensino->id}}">{{$listaensino->descrição}}</option>
                        @endforeach

                    </select>
                    <div class="disciplinaselect d-none" id="service-select">

                    </div>
                </div>
                <div>

                    <div class="form-group mb-10" x-data="{ fileName: '' }">
                        <div class="input-group shadow">
                          <span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
                          <input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="cvfile" class="d-none">
                          <input type="text" class="form-control form-control-lg" placeholder="carrega seu cv" x-model="fileName">
                          <button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> buscar</button>

                        </div>

                   <center>
                    <button class="primary-btn text-uppercase w-50 mb-20" enabled="true">Enviar</button>
                   </center>
                </div>

            </form>
            <label for="" class="form-control alert text-center d-none notify-candidato-submit"></label>
        </div>
    </div>
</div>


@endsection



@section('scriptjs')
<script src="{{url('js/alpinejs.js')}}"></script>

<script>


    $(document).ready(function(){

        $('form[name="form_candidato_professor"]').on('submit',function(event){
       event.preventDefault();

       //BTN ENVIAR
        $.ajax({
            url: "{{route('candidato_professor.storage') }}",
            type: "post",
            data: new FormData(this),
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            dataType: "json",
            success: function(response){

                console.log(response);
                if(!response.result){
                    $('.notify-candidato-submit').removeClass('d-none').addClass('alert-danger').html(response.message);
                }
                else{

                    $('.notify-candidato-submit').removeClass('d-none').addClass('alert-success').html(response.message);
                }
            },
            error:function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
            }
        }).done(function(response){
console.log(response);
        }).fail(function(jqXHR, textStatus, msg){
            console.log(msg);
});
 });










    });



$('.selecEnsino').on('change', function(){

$.ajax({
            url: "{{route('setme.disciplina') }}",
            type: "get",
            data: {'id':$(this).val()},
            dataType: "html",
            beforeSend: function(){

            },
            success: function(response){
              console.log(response);

              if (response.match(/NOT FOUND/)) {
                $('.notify-candidato-submit').removeClass('d-none').addClass('alert-danger').html("Candidatura indisponível");
                $('.disciplinaselect').addClass('d-none');
                return;

              } else {


                $('.disciplinaselect').html('<select class="selecDisciplina form-control form-select form-select-lg mb-3" id="idDisiciplina" name="disciplina"><option datd-display="">Selecione a disciplina:</option></select>').removeClass('d-none');
              $disciplina=JSON.parse(response);
               $.each($disciplina, function(index,value){
                $('#idDisiciplina').append('<option datd-display="" value="'+value.id+'">'+ value.descrição+'</option>');
               });

              }





            },
            error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);

            }

        }).done(function(response){
        if (document.getElementById("service-select")) {
        $('select').niceSelect();
        };

        });

});





$(document).on('click', function(){
    $('.notify-candidato-submit').addClass('d-none')
});


</script>

@endsection

