<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Codigo Facilito</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"> <span class="glyphicon glyphicon-flash"></span>Codigo Facilito</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
    
        <li>{!! link_to('/', $title = 'Inicio', $attributes = ['class'=>'active']) !!}</li>       
        <li>{!! link_to('admin/users', $title = 'Usuarios') !!}</li>
        <li>{!! link_to('/categories', $title = 'Categorias') !!}</li>
        <li>{!! link_to('images',$title = 'Imagenes') !!}</li>
        <li>{!! link_to('tags', $title = 'Tags') !!}</li>       
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Pagina Principal</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Opciones <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Editar Cuenta</a></li>
                       
            <li class="divider"></li>
            <li><a href="#">Cerrar Sesion</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>