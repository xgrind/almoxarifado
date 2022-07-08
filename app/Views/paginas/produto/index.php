<?= $this->extend('layout') ?>

<?= $this->section('conteudo') ?>

<?= show_session() ?>

<?= anchor('produtos/novo', 'Novo', ['class' => 'btn btn-primary']) ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Descrição</th>
            <th scope="col">Grupo</th>            
            <th scope="col">Ativo</th>
            <th scope="col">Opções</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($produtos as $produto) : ?>
            <tr>
                <th scope="row"><?= $produto->id ?></th>
                <td><?= $produto->nome ?></td>                
                <td><?= $produto->grupo ?></td>   
                <td><?= getAtivo($produto->ativo) ?></td>
                <td>
                    <?= anchor("produtos/$produto->id/editar", 'Editar') ?>
                    <?= anchor("produtos/$produto->id/excluir", 'Excluir') ?>
                </td>
            </tr>
        <?php endforeach ?>

    </tbody>
</table>

<?= $this->endSection() ?>