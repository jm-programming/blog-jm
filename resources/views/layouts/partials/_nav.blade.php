   <div id="app">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <span class="glyphicon glyphicon-flash "></span> Codigo Facilito
                    </a>

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    
                    <ul class="nav navbar-nav">
    
              			 @if (!Auth::guest())
                           	 <li>{!! link_to('/users', $title = ' Usuarios', $attributes = ['class'=>'glyphicon glyphicon-user']) !!}</li>
        
        					<li>{!! link_to('/categories', $title = ' Categorias', $attributes = ['class'=>'glyphicon glyphicon-list-alt']) !!}</li>
        					<li>{!! link_to('images',$title = ' Imagenes', $attributes = ['class'=>'glyphicon glyphicon-picture']) !!}</li>
        					<li>{!! link_to('tags', $title = ' Tags', $attributes = ['class'=>'glyphicon glyphicon-tags']) !!}</li>       
                    	 @endif
       
      				</ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        
                        <!-- Authentication Links -->

                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        <li><a href="/"><span class="glyphicon glyphicon-home"></span> Pagina Principal</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                   <li><a href="#"> <span class="glyphicon glyphicon-edit"></span> Editar Cuenta</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <span class="glyphicon glyphicon-off"></span>
                                            Cerrar Sesión
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>



                </div>
            </div>
        </nav>

        
    </div>