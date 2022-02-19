<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="resources\css\estilos.css">

    <title>Subir proyecto</title>

    <style>
        div{
            padding: 10px;
        }

    </style>
</head>
<body>
    <h1>Subir nuevo proyecto</h1>
    @foreach($errors->all() as $error )
        <p style="color:crimson;">{{ $error }}</p>
    @endforeach
    <form action="{{ route('subirproyecto') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Nombre: </label>
            <input type="text" id="name" placeholder="Nombre" name="name" value="{{old('name')}}">
        </div>

        <div>
            <label for="pdf">PDF: </label>
            <input type="file" id="pdf" name="pdf"><br>
        </div>

        <div>
            <label for="vm">VM: </label>
            <input type="file" id="vm" name="vm"><br>
        </div>
        
        <div>
            <button type="submit">Subir!</button>
        </div>



    </form>
</body>
</html>