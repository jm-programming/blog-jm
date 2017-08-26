<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Acceso restringido </title>

    <!-- Bootstrap -->
    {!! Html::style('plugins/bootstrap/css/bootstrap.min.css') !!}
    <!-- Font Awesome -->
    {!! Html::style('plugins/font-awesome/css/font-awesome.min.css') !!}
    <!-- Custom Theme Style -->
    {!! Html::style('plugins/estilos/custom.min.css') !!}
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center text-center">
              <h1 class="error-number">403</h1>
              <h2 class="tamaño">Acceso denegado</h2>
              <p class="parrafo tamaño">No tienes los permisos de autenticación requerida para el acceso a esta vista. <br><a href="/">Desea volver al inicio?</a>
              </p>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>
  </body>
</html>

<style>
	
	h1 {
		color: #FFFFFF;
	}
	.tamaño{
		color: #FFFFFF;
		font-size: 2em;
	}
	a{
		color: #FFFFFF;
	}
	a:hover{
		color: #9CDF88;
	}
</style>