<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contato;
use App\Http\Requests\ContatoRequest;

class ContatosController extends Controller
{
	/**
	 * Exibir todos os contatos
	 *
	 * @return Response
	 */
    public function index()
    {
    	return view('home', ['contatos' => Contato::orderBy('nome', 'asc')->paginate(10)]);
    }

    public function show($contato)
    {}

    /**
     * Criar um novo contato
     *
     * @return Response
     */
    public function create()
    {
    	return view('contatos.create');
    }

    /**
     * Salva um novo contato
     *
     * @param ContatoRequest $request
     * @return Response
     */
    public function store(ContatoRequest $request)
    {
    	$contato = Contato::create($request->all());
		
		session()->flash('flash_message', $contato->nome.' foi adicionado a lista de contatos com sucesso!');

    	return redirect('contatos');
    }

    /**
     * Editar um contato existente
     *
     * @param Contato $contato
     * @return Response
     */
    public function edit(Contato $contato)
    {
    	return view('contatos.edit', ['contato' => $contato]);
    }

    /**
     * Atualiza um contato
     *
     * @param ContatoRequest $request
     * @param Contato $contato
     * @return Response
     */
    public function update(ContatoRequest $request, Contato $contato)
    {
    	$contato->update($request->all());

    	session()->flash('flash_message', $contato->nome.' foi atualizado com sucesso!');

    	return redirect('contatos');
    }

    /**
     * Exclui um contato
     *
     * @param Contato $contato
     * @return Response
     */
    public function destroy(Contato $contato)
    {
    	$contato->delete();

    	session()->flash('flash_message', $contato->nome.' foi excluido da sua lista de contatos com sucesso!');

    	return redirect('contatos');
    }

    /**
     * Pesquisar contatos
     *
     * @param Request $request
     * @return Response
     */
    public function search(Request $request)
    {
    	$searchTerm = $request->input('searchTerm');

    	$contatos = Contato::where('nome', 'like', '%'.$searchTerm.'%')->orWhere('email', 'like', '%'.$searchTerm.'%')->paginate(10);

    	return view('home', ['contatos' => $contatos, 'searchTerm' => $searchTerm]);
    }
}
