<nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">Administração</a>
    </div>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{ url('/') }}"><i class="fa fa-backward"></i> Visualizar front-end</a>
                </li>
                <li>
                    <a href="{{url('admin/dashboard')}}">
                        <i class="fa fa-dashboard fa-fw"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/noticia')}}">
                        <i class="glyphicon glyphicon-bullhorn"></i> Notícias
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/banner')}}">
                        <i class="fa fa-picture-o"></i> Banners
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/promocao')}}">
                        <i class="fa fa-server"></i> Promoções
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/tipo_cardapio')}}">
                        <i class="fa fa-shopping-cart"></i> Tipo Cardápio
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-folder-open-o" aria-hidden="true"></i> Galeria multimidia <span class="fa arrow"></span>
                    </a>
                    <ul class="nav collapse">
                        <li>
                            <a href="{{url('#')}}">
                                <i class="fa fa-picture-o" aria-hidden="true"></i> Álbuns
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/videos')}}">
                                <i class="fa fa-video-camera" aria-hidden="true"></i> Vídeos
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('admin/user')}}">
                        <i class="glyphicon glyphicon-user"></i> Usuários
                    </a>
                </li>
                <li>
                    <a href="{{ url('auth/logout') }}"><i class="fa fa-sign-out"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>