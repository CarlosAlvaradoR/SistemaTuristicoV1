@extends('layouts/plantilla_landing')


@section('content')
   
    @php
        $nombre = 'Carlos';
        $apellidos = 'Alvarado';
    @endphp
 
    <section class="sample-text-area">
        <div class="container box_1170">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-heading">Bienvenido a su perfil - 
                    @php
                        echo $nombre;
                    @endphp
                    </h3>
                    
                </div>
                <div class="col-md-6">
                    <a href="">Ver mis paquetes</a>
                </div>
            </div>

            <hr>
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" value="{{ Auth::user()->email }}" readonly class="form-control"
                            id="inputEmail4">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Nombre</label>
                        <input type="text" value="{{ Auth::user()->name }}" readonly class="form-control"
                            id="inputPassword4">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Dirección</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">DNI</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Check me out
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
            <p class="sample-text">
                {{ Auth::user()->name }}

            </p>
        </div>
    </section>
@endsection
