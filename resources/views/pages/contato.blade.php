@extends('layouts.app')
@section('title') Contato :: @parent @stop

{{-- Content --}}
@section('content')
        <div class="row">
            <div class="page-header">
                <h2>Entre em Contato</h2>
            </div>
        </div>

        <div class="container">

            <div class="col-md-8">
                <section id="contato" style="background-position: 50% 0px;">
                    <!-- Contact Form -->
                    <form action="/helpdesk" method="post" id="contato-form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="col-md-10 col-md-offset-4">
                            <span>Nome:<font color="red">*</font></span>
                            <input type="text" class="form-control" name="nome"
                                   value="{{ Auth::check() ? Auth::user()->name :'' }}" id="inpt-nome"
                                   required="required" placeholder="Nome Completo">
                        </div>

                        <div class="col-md-10 col-md-offset-4">
                            <span>E-mail:<font color="red">*</font></span>
                            <input type="email" class="form-control" name="email"
                                   value="{{ Auth::check() ? Auth::user()->email :'' }}" id="inpt-email"
                                   required="required" placeholder="Seu e-mail">
                        </div>

                        <div class="col-md-10 col-md-offset-4">
                            <span>Telefone:<font color="red">*</font></span>
                            <input type="text" class="form-control telefone" name="telefone" value="" id="telefone"
                                   required="required" placeholder="Telefone">
                        </div>

                        <div class="col-md-10 col-md-offset-4">
                            <span>Assunto:<font color="red">*</font></span>
                            <input type="text" class="form-control" name="assunto" value="" id="inpt-assunto"
                                   required="required" placeholder="Assunto">
                        </div>

                        <div class="col-md-10 col-md-offset-4">
                            <span>Mensagem:<font color="red">*</font></span>
                            <textarea name="mensagem" class="form-control" value="" id="txtarea" rows="5"
                                      maxlength="501"
                                      onkeyup="verificachars(this.value)"
                                      onchange="verificachars(this.value)"
                                      required="required" placeholder="Mensagem"></textarea>
                        </div>
                        <div class="col-md-10 col-md-offset-4" align="center">
                            <input type="submit" class="btn btn-primary" value="Enviar mensagem">
                        </div>
                    </form>
                    <!--  = /contact form =  -->
                </section><!-- end contact section -->
            </div><!-- end col-md-8 -->
        </div><!-- end container-fluid -->
    <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')
@endsection
@section('scripts')
    <script type="text/javascript">
        function verificachars(valor){
            if(valor.length > 500){
                swal({title: "Atenção", text: 'Limite de 500 caracteres!', type: 'info'});
                return(false)
            }

        }

        var SPMaskBehavior = function (val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                spOptions = {
                    onKeyPress: function (val, e, field, options) {
                        field.mask(SPMaskBehavior.apply({}, arguments), options);
                    }
                };
        $(function () {
            $('#telefone').mask(SPMaskBehavior, spOptions);
            $('#contact-form').submit(function (ev) {
                startLoading();
            });
        });
    </script>
@stop