<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css"/>
 

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('WELCOME API REST FULL LARAVEL') }}
        </h2>
    </x-slot>

   <p></p>
    <div class="container">
      <h3>Lista de Agencias Expendedoras de Gasolina</h3>
        <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
            </div>

            <table id="example" class="table table-striped table-bordered dt-responsive" style="width:100%">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Razon Social de la Agencia</th>
                  <th scope="col">CP</th>
                  <th scope="col">Direccion</th>
                  <th scope="col">u$d Premium</th>
                  <th scope="col">u$d Regular</th>
                  <th scope="col">Latitud</th>
                  <th scope="col">Longitud</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead> 
              <tbody>
                @foreach ($agencies as $agency)
                <tr>
                  <th scope="col">{{$agency->id}}</th>
                  <th>{{$agency->nameAgency}}</th>
                  <th>{{$agency->cp}}</th>
                  <th>{{$agency->address}}</th>
                  <th>{{$agency->premium}}</th>
                  <th>{{$agency->regular}}</th>
                  <th>{{$agency->latitude}}</th>
                  <th>{{$agency->longitude}}</th>
                  <th>

                    <form action="{{ route('destroy', $agency->id) }}" method="POST">
                      @csrf
                      @method('DELETE') 
                      <a href="{{ route('edit', $agency->id) }}" class="btn btn-outline-primary btn-sm" role="button" aria-pressed="true"><i class="fa-solid fa-pencil"></i></a>
                      <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></button> 
                    </form>
                     
                  </th>

                  
                </tr>
                @endforeach

              
                
              </tbody>
            </table>
                
            </div>
             
        </div>
        
         
    </div>

    

    <div class="alert alert"></div>

    { 


</x-app-layout>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
 

  <script>
    $(document).ready(function () {
      $.noConflict();
        var table = $('#example').DataTable();
    });
  </script>


