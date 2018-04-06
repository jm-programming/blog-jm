@extends('layouts.app')
@section('title','Inicio de la pagina') 
@section('content')
<div class="container">
@include('alerts._success')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading rojo">Welcome</div>
            
                <div class="panel-body">
					  <h1>Blog de Imagenes<h1>
					  <hr/>
					    <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi in iure quisquam ipsum illum, harum quibusdam at error quia voluptatum, mollitia excepturi minima sapiente maiores, reiciendis! Nesciunt delectus, blanditiis nulla!</h3>
					    <hr/>
                        <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi adipisci ad vero reprehenderit pariatur porro, culpa molestias dolores provident dolor ut impedit dignissimos possimus eum incidunt atque vitae perferendis laudantium!</span>
                       
  				</div>
  				<div class="panel-footer azul">Todos los derechos reservados Copyright 2017 Juan Manuel</div>


            </div>
        </div>
    </div>
</div>

@endsection
