 <html lang="en">
 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.5">
        <title>Laravel</title>
        <style type="text/css">
        table{
         background:grey;
         border:0;
        }
       </style>
</head>
<body>
    <div class="table-responsive-lg">

    <table border="1"class="table table-dark">

    <thead>
    <tr>
      <th scope="col">ID </th>
      <th scope="col">NOMBRE </th>
      <th scope="col">APELLIDOS</th>
      <th scope="col">CORREO</th>
      <th scope="col">TELEFONO</th>
      <th scope="col">DIRECCION</th>
      <th scope="col">CLAVE ACCESO</th>
      <th scope="col">FECHA DE NACIMIENTO</th>
      <th scope="col">ESTADO CIVIL</th>
      <th scope="col">SUELDO ANUAL</th>
      <th scope="col">IP</th>
   
    </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <th scope="row">{{$cliente->id}}</td>
            <td>{{$cliente->nombre}}</td>
            <td>{{$cliente->apellidos}}</td>
            <td>{{$cliente->correo}}</td>
            <td>{{$cliente->telefono}}</td>
            <td>{{$cliente->direccion}}</td>
            <td>{{$cliente->claveacceso}}</td>
            <td>{{$cliente->fechanacimiento}}</td>
            <td>{{$cliente->estadocivil}}</td>
            <td>{{$cliente->sueldoanual}}</td>
            <td>{{$cliente->ip}}</td>
            <td><a href="{{url('cliente/'.$cliente->id) }}" class="btn btn-info">Ver</a></td>
            <td><a href="{{url('cliente/'.$cliente->id.'/edit') }}" class="btn btn-success">Editar</a></td>
            <td>
                <form action="{{url('cliente/'.$cliente->id)}}" method="post" class="destroy">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Eliminar">
                </form>
            </td>
        </tr>
         @endforeach
    </tbody>  
    </div>
   
    </table>
    <div class="d-flex justify-content-around">
        <a href="{{url('cliente/create')}}" class="btn btn-info">AGREGAR CLIENTE</a>
        
    </div>
    
</body>
</html>

