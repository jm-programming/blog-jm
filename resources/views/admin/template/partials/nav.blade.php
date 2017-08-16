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
    
        <li>{!! link_to('/', $title = ' Inicio ', $attributes = ['class'=>'active glyphicon glyphicon-home',]) !!}</li>       
        <li>{!! link_to('/users', $title = ' Usuarios', $attributes = ['class'=>'glyphicon glyphicon-user']) !!}</li>
        <li>{!! link_to('/categories', $title = ' Categorias', $attributes = ['class'=>'glyphicon glyphicon-list-alt']) !!}</li>
        <li>{!! link_to('images',$title = ' Imagenes', $attributes = ['class'=>'glyphicon glyphicon-picture']) !!}</li>
        <li>{!! link_to('tags', $title = ' Tags', $attributes = ['class'=>'glyphicon glyphicon-tags']) !!}</li>       
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span> Pagina Principal</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="glyphicon glyphicon-wrench"></span> Opciones <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#"> <span class="glyphicon glyphicon-edit"></span> Editar Cuenta</a></li>
                       
            <li class="divider"></li>
            <li><a href="#"> <span class="glyphicon glyphicon-off"></span> Cerrar Sesion</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>