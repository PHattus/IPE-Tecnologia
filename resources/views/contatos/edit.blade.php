@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row col-md-12">
		<div class="panel panel-primary">
            <div class="panel-heading">Editar contato</div>
			<div class="panel-body">

				{!! Form::model($contato, ['method' => 'PATCH', 'action' => ['ContatosController@update', $contato->id]]) !!}

					@include('contatos.form')

					@include('errors.list')

				{!! Form::close() !!}

			</div>
		</div>
	</div>
</div>

@endsection