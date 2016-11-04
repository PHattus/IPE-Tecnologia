@extends('layouts.app')

@section('content')

<div class="container">
    @if(Session::has('flash_message'))
        <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
    @endif
    <div class="row">
        <div class="col-md-10">
            {!! Form::open(['method' => 'GET', 'url' => 'contatos/search', 'class' => 'form-inline']) !!}
                <div class="form-group input-group col-md-10">
                    <input type="text" class="form-control" id="searchTerm" name="searchTerm" value="{{ isset($searchTerm) ? $searchTerm : '' }}">
                </div>
                <button type="submit" class="btn btn-info">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Pesquisar
                </button>
            {!! Form::close() !!}
        </div>
        <div class="col-md-2">
            <a href="{{ url('contatos/create') }}" class="btn btn-success" role="button">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Adicionar novo contato
            </a>
        </div>
    </div>
    <br/>

    @foreach($contatos as $contato)

        @if($loop->first)
            <div class="row">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="col-md-4">Nome</th>
                            <th class="col-md-4">Email</th>
                            <th class="col-md-2">Telefone</th>
                            <th class="col-md-2 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
        @endif

                        <tr>
                            <td>{{ $contato->nome }}</td>
                            <td>{{ $contato->email }}</td>
                            <td>{{ $contato->telefone }}</td>
                            <td class="text-center">
                                <a href="{{ url('contatos/'.$contato->id.'/edit') }}" class="btn btn-warning btn-xs" role="button">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
                                </a>
                                <a href="#" data-toggle="modal" data-target="#confirmDelete" data-nomeContato="{{ $contato->nome }}" data-contatoId="{{ $contato->id }}" class="btn btn-danger btn-xs deleteDialogBox" role="button">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Excluir
                                </a>
                                {!! Form::open(['method' => 'DELETE', 'action' => ['ContatosController@destroy', $contato->id], 'id' => 'formDelete_'.$contato->id]) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>

        @if($loop->last)
                    </tbody>
                </table>
                {{ $contatos->links() }}
            </div>
        @endif

    @endforeach

    <div id="confirmDelete" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirmar exclusão</h4>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja excluir o contato <span id="nomeContato"></span>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger confirmDeleteButton" id="-1">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="">Não</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">

    $('#confirmDelete').on('show.bs.modal', function(e) {
        var data = $(e.relatedTarget).data();
        $('#nomeContato').html(data.nomecontato);
        $('.confirmDeleteButton').attr('id', data.contatoid);
    });

    $('#confirmDelete').on('click', '.confirmDeleteButton', function(e) {
        $('#confirmDelete').modal('hide');
        $('#formDelete_'+this.id).submit();
    });

    $('div.alert').delay(5000).slideUp(300);

</script>

@endsection