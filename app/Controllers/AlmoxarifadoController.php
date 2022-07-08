<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\AlmoxarifadoEntity;
use App\Models\AlmoxarifadoModel;

class AlmoxarifadoController extends BaseController
{
    protected $almoxarifadoModel;

    public function __construct() 
    {        
        $this->almoxarifadoModel = new AlmoxarifadoModel();
    }

    public function index()
    {
        $almoxarifados = $this->almoxarifadoModel->findAll();       

        $dados = [
            'almoxarifados' => $almoxarifados,
            'titulo' => 'Lista de Almoxarifados'
        ];

        return view('paginas/almoxarifado/index', $dados);
        
    }

    public function novo()
    {        
        $dados = [
            'almoxarifado' => new AlmoxarifadoEntity(),
            'erros' => [],
            'titulo' => 'Cadastro de Almoxarifado'
        ];

        $dt = $this->request->getPost();

        if ($dt) {
            $almoxarifado = new AlmoxarifadoEntity($dt);

            if ($this->almoxarifadoModel->save($almoxarifado)) {
                return redirect('almoxarifados')->with('sucesso', 'Cadastrado com sucesso!');
            } 

            $dados['almoxarifado'] = $almoxarifado;            
            $dados['erros'] = $this->almoxarifadoModel->errors();            
        }

        return view('paginas/almoxarifado/novo', $dados);
    }

    public function editar(int $id)
    {
        $almoxarifado = $this->almoxarifadoModel->find($id);

        if (is_null($almoxarifado)) {
            return redirect('almoxarifados')->with('erro', 'Almoxarifado não encontrado.');
        }        

        $dados = [
            'almoxarifado' => $almoxarifado,
            'erros' => [],
            'titulo' => 'Edição de Almoxarifado'
        ];

        $dt = $this->request->getPost();        

        if ($dt) {            
            $almoxarifado->fill($dt);
            
            if ($almoxarifado->hasChanged() && $this->almoxarifadoModel->save($almoxarifado)) {
                return redirect('almoxarifados')->with('sucesso', 'Almoxarifado atualizado com sucesso!');
            }

            $dados['almoxarifado'] = $almoxarifado;
            $dados['erros'] = $this->almoxarifadoModel->errors();
            
        }

        return view('paginas/almoxarifado/editar', $dados);
    }

    public function excluir(int $id)
    {
        $almoxarifado = $this->almoxarifadoModel->find($id);        

        if (is_null($almoxarifado)) {
            return redirect('almoxarifados')->with('erro', 'Almoxarifado não encontrado.');
        }   

        if ($this->almoxarifadoModel->delete($id)) {
            return redirect('almoxarifados')->with('sucesso', 'Almoxarifado excluído com sucesso!');
        }

        return redirect('almoxarifados')->with('erro', 'Erro ao excluír.');
    }

    
}
