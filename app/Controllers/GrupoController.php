<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\GrupoEntity;
use App\Models\AlmoxarifadoModel;
use App\Models\GrupoModel;

class GrupoController extends BaseController
{
    protected $almoxarifadoModel;
    protected $grupoModel;

    public function __construct() 
    {
        $this->almoxarifadoModel = new AlmoxarifadoModel();
        $this->grupoModel = new GrupoModel();
    }

    public function index()
    {
        $grupos = $this->grupoModel
            ->join('almoxarifados', 'almoxarifados.id = almoxarifado_id')
            ->select('grupos.descricao, almoxarifados.descricao as almoxarifado, grupos.id, grupos.ativo')
            ->findAll();

        $dados = [
            'grupos' => $grupos,
            'titulo' => 'Lista de Grupos'
        ];

        return view('paginas/grupo/index', $dados);
    
    }

    public function novo()
    {
        $dados = [
            'grupo' => new GrupoEntity(),
            'almoxarifados' => $this->almoxarifadoModel->findAll(),
            'erros' => [],
            'titulo' => 'Cadastro de Grupo'
        ];

        $dt = $this->request->getPost();

        if ($dt) {
            $grupo = new GrupoEntity($dt);

            if ($this->grupoModel->save($grupo)) {
                return redirect('grupos')->with('sucesso', 'Grupo inserido com sucesso!');
            }

            $dados['grupo'] = $grupo;
            $dados['erros'] = $this->grupoModel->errors();
        }

        return view('paginas/grupo/novo', $dados);
    }

    public function editar(int $id)
    {
        $grupo = $this->grupoModel->find($id);       

        if (is_null($grupo)) {
            return redirect('grupos')->with('erro', 'Grupo não encontrado.');
        }

        $dados = [
            'grupo' => $grupo,
            'almoxarifados' => $this->almoxarifadoModel->findAll(),
            'erros' => [],
            'titulo' => 'Edição de Grupo'
        ];

        $dt = $this->request->getPost();

        if ($dt) {
            $grupo->fill($dt);

            if ($grupo->hasChanged() && $this->grupoModel->save($grupo)) {
                return redirect('grupos')->with('sucesso', 'Grupo atualizado com sucesso!');
            }
            
            $dados['erros'] = $this->grupoModel->errors();
        }

        return view('paginas/grupo/editar', $dados);
    }
}
