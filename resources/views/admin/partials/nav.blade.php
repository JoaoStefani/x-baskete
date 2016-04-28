<nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Administração xBaskete</a>
    </div>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{ URL::to('') }}"><i class="fa fa-backward"></i> Voltar</a>
                </li>
                <li>
                    <a href="{{url('admin/dashboard')}}">
                        <i class="fa fa-dashboard fa-fw"></i> Administração
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/exercicio')}}">
                        <i class="fa fa-language"></i> Exércicio
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/user')}}">
                        <i class="glyphicon glyphicon-user"></i> Usuários
                    </a>
                </li>
                <li>
                    <a href="{{ URL::to('auth/logout') }}"><i class="fa fa-sign-out"></i> Sair</a>
                </li>
            </ul>
        </div>
    </div>
</nav>