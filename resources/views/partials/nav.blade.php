<div id="topo">
    <div class="container">

        <div id="header">
            <div class="col-md-3 col-sm-12 nopadding">
                <a id="logo" href="/"><img class="img-responsive" src="/img/logo.png" border="0"></a>
            </div>
            <div class="col-md-9 col-sm-12 nopadding">
                <div class="col-md-7 col-md-offset-5 nopadding" id="header_content">
                    <div class="col-xs-7 col-xs-12 nopadding">
                        <h1>X-Baskete</h1>
                    </div>
                    <div class="col-xs-5 nopadding">
                        <div id="search_logout">
                            <input type="hidden" name="module" value="busca">
                            <div class="input-group">
                                <input type="text" name="buscar" value="" class="form-control input-sm">
                            <span class="input-group-btn">
                                <button class="btn btn-search" title="Buscar" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                            </div><!-- /input-group -->
                        </div>
                        <ul id="top_nav">
                            <li id="email"><a class="disabled" data-toggle="tooltip" data-placement="bottom" title="E-mail" href="http://webmail.farmais.com.br/" target="{{'chat'}}" data-original-title="E-mail"></a></li>
                            <li id="baloon"><a data-toggle="tooltip" data-placement="bottom" title="Fale Conosco" href="{{ url('faleconosco') }}" data-original-title="Fale Conosco"></a></li>
                            <li id="thumb"><a data-toggle="tooltip" data-placement="bottom" title="Facebook" href="https://pt-br.facebook.com/redefarmais" target="_blank" data-original-title="Facebook"></a></li>
                            <li id="device"><a class="disabled" data-toggle="tooltip" data-placement="bottom" title="" href="{{ url('marketingOnline') }}" data-original-title="Marketing Online"></a></li>
                        </ul>
                    </div>
                    {{--<div class="clearfix"></div>--}}
                </div>
            </div>

        </div>

        <nav class="navbar navbar-custom">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false" style="line-height: 40px;">Informações</a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ URL::to('avisos') }}"> Avisos</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('banner') }}"> Banners</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('fornecedor') }}"> Fornecedores</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('departamento') }}"> Departamentos</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('videos') }}"> Videos</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('imprensas') }}"> Imprensas</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false" style="line-height: 40px;">Negócios</a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ URL::to('industria') }}"> Condições Comerciais</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('tabloides') }}"> Pedido de Tabloide</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"  style="line-height: 20px;" >Materiais<br>de Loja</a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ URL::to('cracha') }}"> Crachás</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('materiaislojas') }}"> Materiais de Loja</a>
                            </li>
                            {{--<li>--}}
                                {{--<a href="{{ URL::to('uniformes') }}"> Uniformes</a>--}}
                            {{--</li>--}}
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="{{ url('') }}"  style="line-height: 40px;">Trade</a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ URL::to('/') }}"> Em breve</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('/') }}"> Em breve</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="{{ url('') }}"  style="line-height: 40px;">Campo</a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ URL::to('/') }}"> Em breve</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('/') }}"> Em breve</a>
                            </li>
                        </ul>
                    </li>    
                </ul>
            </div>
        </nav>
    </div>
</div>