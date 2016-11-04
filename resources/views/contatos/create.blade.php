@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row col-md-12">
		<div class="panel panel-primary">
            <div class="panel-heading">Adicionar contato</div>
			<div class="panel-body">

				{!! Form::open(['url' => 'contatos']) !!}

					@include('contatos.form')

					@include('errors.list')

				{!! Form::close() !!}
			
			</div>
		</div>
	</div>
</div>

@endsection