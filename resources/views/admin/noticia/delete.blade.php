@extends('admin.layouts.modal')
@section('content')
	{!! Form::model($noticia, array('url' => url('admin/noticia') . '/' . $noticia->id, 'method' => 'delete', 'class' => 'bf', 'files'=> true)) !!}
	<div class="form-group">
		<div class="controls">
			Deseja excluir a notícia?<br>
			<element class="btn btn-warning btn-sm close_popup">
				<span class="glyphicon glyphicon-ban-circle"></span>
				Cancelar
			</element>
			<button type="submit" class="btn btn-sm btn-danger">
				<span class="glyphicon glyphicon-trash"></span>
				Deletar
			</button>
		</div>
	</div>
	{!! Form::close() !!}
@endsection
