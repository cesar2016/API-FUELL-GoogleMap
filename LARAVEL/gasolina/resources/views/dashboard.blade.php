<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenidos API Rest Full - Gasolina ... ') }}
        </h2>
    </x-slot>

   <p></p>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info text-white"><h1><i class="fa-solid fa-gas-pump"></i></h1></div>
    
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
                    <div class="container">
                        <div class="alert alert-primary"> 
                            <strong>CARGAR BASE DE DATOS </strong> 
                        </div>
                        <p><strong>Se consulta a la API con la libreria GuzzleHTTP para cargar la DB con los datos solicitados</strong></p> 
                        <form action="{{ route('store')}}" method="POST" >
                            @method('POST')
                            @csrf                 
                           
                            <div class="form-row align-items-center">
                              <div class="col-auto my-1">
                                <button type="submit" class="btn btn-danger btn-lg"><i class="fa-solid fa-database"></i> Cargar DB</button>
                              </div>
                            </div>
                          </form>

                          <hr>

                          <div class="alert alert-primary"> 
                             
                            <a href="/table-agencies" class="btn btn-lg btn-primary" role="button"> 
                              <i class=" fa-solid fa-shop"></i> 
                            </a>
                            <strong> Consultar lista de agencias </strong>
                          </div>

                          <hr>

                          <div class="alert alert-primary"> 
                            <strong>Ingrese los datos dela Agencia a registrar</strong> 
                          </div>

                          <form class="needs-validation" action="{{ route('store')}}" method="POST" novalidate>
                            @method('POST')
                            @csrf 
                            <div class="form-row">
                              <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Agency Name</label>
                                <input type="text" class="form-control" id="nameAgency" name="nameAgency" placeholder="YPF Serviclub" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Name Agency.
                                </div>
                              </div>
                             </div>
                             <div class="form-row">
                              <div class="col-md-3 mb-3">
                                <label for="validationCustom02">Postal Code</label>
                                <input type="text" class="form-control" id="cp" name="cp" placeholder="3070" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Postal Code.
                                </div>
                              </div>
                              <div class="col-md-9 mb-3">
                                <label for="validationCustom02">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Last name" required>
                                <div class="invalid-feedback">
                                    Please provide a Address.
                                </div>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="col-md-3 mb-3">
                                <label for="validationCustom03">PREMIUM</label>
                                <input type="text" class="form-control" id="premium" name="premium" placeholder="180.05" required>
                                <div class="invalid-feedback">
                                  Please provide a valid city.
                                </div>
                              </div>
                              <div class="col-md-3 mb-3">
                                <label for="validationCustom04">REGULAR</label>
                                <input type="text" class="form-control" id="regular" name="regular" placeholder="120.36" required>
                                <div class="invalid-feedback">
                                  Please provide a valid state.
                                </div>
                              </div>
                              <div class="col-md-3 mb-3">
                                <label for="validationCustom05">LATITUDE</label>
                                <input type="text" class="form-control" id="latitude" name="latitude" placeholder="-30,8965" required>
                                <div class="invalid-feedback">
                                  Please provide a valid titude.
                                </div>
                              </div>
                              <div class="col-md-3 mb-3">
                                <label for="validationCustom05">LONGITUDE</label>
                                <input type="text" class="form-control" id="longitude" name="longitude" placeholder="-657,785" required>
                                <div class="invalid-feedback">
                                  Please provide a valid Longitude.
                                </div>
                              </div>
                              <input type="text" id="status" name="status" value="1" hidden>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit form</button>
                          </form>
            
                    </div>
                    
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item active">DOLLAR TODAY</li>            
                    <small class="list-group-item">
                        {{date('d-M-y', strtotime($USD['fecha'])) }}
                    </small>
                    <li class="list-group-item">COMPRA <strong>{{$USD['compra']}}</strong></li>
                    <li class="list-group-item">VENTA <strong>{{$USD['venta']}}</strong></li>                    
                {{-- @endforeach --}}            
                 
            </ul>
        </div>
        
         
    </div>

    

    <div class="alert alert"></div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
 

<script>
  $( document ).ready(function() {

    // Validacion del formulario
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();




     
  });
    
    </script>
