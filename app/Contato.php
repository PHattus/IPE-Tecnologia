<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
	/**
	 * Tabela do banco de dados
	 *
	 * @var string
	 */
    protected $table = 'contatos';

    /**
     * Campos que podem ser preenchidos para um contato
     *
     * @var array
     */
    protected $fillable = [
    	'nome',
    	'email',
    	'telefone'
    ];
}
