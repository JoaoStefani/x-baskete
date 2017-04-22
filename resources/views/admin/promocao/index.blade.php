@extends('admin.layouts.modal')
{{-- Content --}}
@section('content')
<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab"> Cadastro de Carros</a></li>
</ul>
<!-- ./ tabs -->
@if (isset($carros))
    {!! Form::model($carros, array('url' => URL::to('admin/carros') . '/' . $carros->id, 'method' => 'put', 'class' => 'bf', 'id'=>'fupload', 'files'=> true)) !!}
@else
    {!! Form::open(array('url' => URL::to('admin/carros'), 'method' => 'post', 'class' => 'bf', 'id'=>'fupload', 'files'=> true)) !!}
@endif
<div class="tab-content">
    <!-- General tab -->
        <div class="panel panel-default">
              <div class="panel-heading col-md-12">
                <h3 class="panel-title">
                    <button type="button" id="btn_add_lanche" class="btn btn-success btn-xs pull-right">Adicionar Lanche</button>
                    <button type="button" id="btn_add_bebida" class="btn btn-warning btn-xs pull-right">Adicionar Bebida</button>
                </h3>
              </div>
              <div class="panel-body" id="pedidos_itens">
                <div class="col-md-12" id="pre_fotos">
                     <!-- Remover foto para fazer a atualização -->
                    <?php
                        $quant_item = 0;
                    ?>        
                    @if(isset($carros))
                        <?php 
                            $id_foto = 0;
                        ?>
                        @if(count($carros->midias))
                            <div class="col-md-12">
                                <h3>Suas Midias</h3>
                            </div>
                           @foreach ($carros->midias as $item)
                                <?php 
                                    $quant_item++;
                                ?>
                                @if($item->tipo == 'f')
                                    <div id="bloco_item{{ $quant_item}}" style="margin-bottom:10px">
                                        {!! Form::hidden('fotos['.$quant_item.'][id]', $item->id, ['id'=>'foto_id'.$quant_item]) !!}
                                        <div class="col-md-3">
                                            <img class="img-rounded" src="{{'/appfiles/carros/'.$carros->id.'/'.$item->foto}}" width="150">
                                            <button type="button" class="close" aria-label="Close" onclick="remove_foto({{$quant_item}})"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                    </div>
                                @endif
                                @if($item->tipo == 'v')
                                    <div id="bloco_item{{ $quant_item }}" class="form-group">
                                        {!! Form::hidden('midia['.$quant_item.'][id]', $item->id, ['id'=>'vidio_id'.$quant_item]) !!}
                                        <div class="col-md-10"><label>Link do Video</label><input class="form-control form" id="link{{$quant_item}}" name="midia[{{$quant_item}}][link]" value="{{$item->link}}" type="text"/></div>
                                        <button type="button" class="close" aria-label="Close" onclick="remove_video({{$quant_item}})"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                @endif
                            @endforeach 
                        @endif 
                        <div class="col-md-12">
                            <hr size="10" width="100%" align="center" noshade>   
                        </div>   
                    @endif
                </div>
              </div>
        </div>
    </div>
</div>
    <div class="form-group">
        <div class="col-md-12">
            <button type="reset" class="btn btn-sm btn-warning close_popup">
                <span class="glyphicon glyphicon-ban-circle"></span> {{
				trans("admin/modal.cancel") }}
            </button>
            <button type="submit" class="btn btn-sm btn-success">
                <span class="glyphicon glyphicon-ok-circle"></span>
                @if	(isset($carros))
                    Salvar
                @else
                    Salvar
                @endif
            </button>
        </div>
    </div>
{!! Form::close() !!}
@stop

@section('scripts')
<script type="text/javascript">
//Remover foto para fazer a atualização
function remove_foto(posicao_foto){
    if($('#foto_id'+posicao_foto).length){
        id_foto = $('#foto_id'+posicao_foto).val();
        jQuery.ajax({
              url: "/admin/carros/remove_foto/"+id_foto
            }).done(function(retorno) {
                remover(posicao_foto);
            });
    }
}

function remove_video(posicao_foto){
    if($('#vidio_id'+posicao_foto).length){
    id_foto = $('#vidio_id'+posicao_foto).val(); 
    jQuery.ajax({
          url: "/admin/carros/remove_video/"+id_foto
        }).done(function(retorno) {
            remover(posicao_foto);
        });
    }
}
// Função para remover os elementos
function remover(qual) {
    jQuery('#bloco_item'+qual).remove();
}

//Fazer seleção de fotos
var quant_item = {{$quant_item}};;

jQuery('#btn_add_lanche').click(function(){
    quant_item++;
    var bloco_item = '<div class="form-group" id="bloco_item'+quant_item+'" style="margin-bottom:10px">\
            <input type="hidden" name="fotos['+quant_item+'][bebida]"><input type="hidden" name="fotos['+quant_item+'][tipo]" value="lanche">\
            <div class="col-md-8"><label>Lanche</label><select class="form-control" id="lanche" name="fotos['+quant_item+'][lanche]" width="150" type="text" required="required" onchange="preview(this, '+quant_item+');"/></div>\
            <button type="button" id="btn_remover" onclick="remover('+quant_item+')" class="close" aria-label="Close" ><span aria-hidden="true">&times;</span></button>\
        </div>';


    jQuery('#pedidos_itens').append(bloco_item);
});

jQuery('#btn_add_bebida').click(function(){
    quant_item++;
    var bloco_item = '<div class="form-group" id="bloco_item'+quant_item+'" style="margin-bottom:10px">\
        <input type="hidden" name="midia['+quant_item+'][lanche]"><input type="hidden" name="midia['+quant_item+'][tipo]" value="bebida">\
        <div class="col-md-8"><label>Bebida</label><select class="form-control form" name="midia['+quant_item+'][bebida]" width="150" type="text" /></div>\
        <button type="button" id="btn_remover" onclick="remover('+quant_item+')" class="close" aria-label="Close" ><span aria-hidden="true">&times;</span></button>\
    </div>';

    jQuery('#pedidos_itens').append(bloco_item);
});

</script>
@stop