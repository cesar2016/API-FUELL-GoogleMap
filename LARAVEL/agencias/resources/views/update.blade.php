<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('API CHALLENGE ESTACIONES DE SERVICIO') }}
        </h2>
    </x-slot>

   <p></p>
    <div class="container">
        <div class="row justify-content-center">
                <div class="card">
                    <div class="card-header bg-info text-white">{{ __('SALE FUELL') }} <h1><i class="fa-solid fa-gas-pump"></i></h1></div>
    
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
                    <h1 class="alert text-center">ACTUALIZAR DATOS</h1>
                    <div class="jumbotron"> 
                        <form class="needs-validation" action="{{ route('update', $agency->id) }}" method="POST" novalidate>
                          @method('PUT')
                          @csrf 
                          <div class="form-row">
                            <div class="col-md-12 mb-3">
                              <label for="validationCustom01">Agency Name</label>
                              <input type="text" class="form-control" id="nameAgency" name="nameAgency" value="{{$agency->nameAgency}}" required>
                              <div class="invalid-feedback">
                                  Please provide a valid Name Agency.
                              </div>
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="col-md-3 mb-3">
                              <label for="validationCustom02">Postal Code</label>
                              <input type="text" class="form-control" id="cp" name="cp" value="{{$agency->cp}}"  required>
                              <div class="invalid-feedback">
                                  Please provide a valid Postal Code.
                              </div>
                            </div>
                            <div class="col-md-9 mb-3">
                              <label for="validationCustom02">Address</label>
                              <input type="text" class="form-control" id="address" name="address" value="{{$agency->address}}"  required>
                              <div class="invalid-feedback">
                                  Please provide a Address.
                              </div>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="col-md-3 mb-3">
                              <label for="validationCustom03">PREMIUM</label>
                              <input type="text" class="form-control" id="premium" name="premium" value="{{$agency->premium}}"  required>
                              <div class="invalid-feedback">
                                Please provide a valid city.
                              </div>
                            </div>
                            <div class="col-md-3 mb-3">
                              <label for="validationCustom04">REGULAR</label>
                              <input type="text" class="form-control" id="regular" name="regular" value="{{$agency->regular}}"  required>
                              <div class="invalid-feedback">
                                Please provide a valid state.
                              </div>
                            </div>
                            <div class="col-md-3 mb-3">
                              <label for="validationCustom05">LATITUDE</label>
                              <input type="text" class="form-control" id="latitude" name="latitude" value="{{$agency->latitude}}"  required>
                              <div class="invalid-feedback">
                                Please provide a valid titude.
                              </div>
                            </div>
                            <div class="col-md-3 mb-3">
                              <label for="validationCustom05">LONGITUDE</label>
                              <input type="text" class="form-control" id="longitude" name="longitude" value="{{$agency->longitude}}" required>
                              <div class="invalid-feedback">
                                Please provide a valid Longitude.
                              </div>
                            </div>
                            <div class="col-md-3 mb-3">
                              <label for="validationCustom05">Activar / Desactivar</label>
                              <input type="text" class="form-control" id="longitude"name="status" value="{{$agency->status}}" required>
                              <div class="invalid-feedback">
                                Please provide a valid Longitude.
                              </div>
                            </div>
                             
                          </div>
                          <button class="btn btn-primary" type="submit">Submit form</button>
                        </form>
            
                    </div>
                    
                </div>
            </div> 
             
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
