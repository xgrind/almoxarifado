<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\ProdutoEntity;
use App\Models\GrupoModel;
use App\Models\ProdutoModel;

class ProdutoController extends BaseController
{
    protected $produtoModel;
    protected $grupoModel;

    public function __construct()
    {
        $this->produtoModel = new ProdutoModel();
        $this->grupoModel = new GrupoModel();
    }

    public function index()
    {
        $produtos = $this->produtoModel
            ->join('grupos', 'grupos.id = grupo_id')
            ->select('produtos.nome, produtos.id, produtos.ativo, grupos.descricao as grupo')
            ->findAll();

        $dados = [
            'produtos' => $produtos,
            'titulo' => 'Lista de Produtos'
        ];

        return view('paginas/produto/index', $dados);
    }

    public function novo()
    {
        $dados = [
            'produto' => new ProdutoEntity(),
            'grupos' => $this->grupoModel->findAll(),
            'erros' => [],
            'titulo' => 'Cadastro de Produto'
        ];        

        $dt = $this->request->getPost();

        if ($dt) {
            $produto = new ProdutoEntity($dt);

            if ($this->produtoModel->save($produto)) {
                return redirect('produtos')->with('sucesso', 'Produto cadastrado com sucesso!');
            }

            $dados['erros'] = $this->produtoModel->errors();
            $dados['produto'] = $produto;
        }

        return view('paginas/produto/novo', $dados);
    }

    public function editar(int $id)
    {
        $produto = $this->produtoModel->find($id);

        if (is_null($produto)) {
            return redirect('produtos')->with('sucesso', 'Produto cadastrado com sucesso!');
        }

        $dados = [
            'produto' => $produto,
            'grupos' => $this->grupoModel->findAll(),
            'titulo' => 'Edição de Produto',
            'erros' => []
        ];

        $dt = $this->request->getPost();

        if ($dt) {
            $produto->fill($dt);

            if ($produto->hasChanged() && $this->produtoModel->save($produto)) {
                return redirect('produtos')->with('sucesso', 'Produto atualizado com sucesso!');
            }

            $dados['erros'] = $this->produtoModel->errors();
        }

        return view('paginas/produto/editar', $dados);
    }
}
