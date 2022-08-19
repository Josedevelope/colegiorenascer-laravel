<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste</title>
</head>
<body>

    <div>
        <form action="{{ route("candidato_professor.storage") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="nome" placeholder="nome" id=""><br>
            <input type="text" name="bi" placeholder="bi" id=""><br>
            <input type="tel" name="telemovel" placeholder="telemovel" id=""><br>
            <input type="file" name="cv_file" id=""><br>
            <input type="file" name="other_files" id=""><br>
        <input type="submit" value="enviar">
        </form>

        
    </div>

</body>
</html>
