<?= $this->extend('layout') ?>

<?= $this->section('conteudo') ?>

<?= show_session() ?>

<?= anchor('grupos/novo', 'Novo', ['class' => 'btn btn-primary']) ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Descrição</th>
            <th scope="col">Almoxarifado</th>
            <th scope="col">Ativo</th>
            <th scope="col">Opções</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($grupos as $grupo) : ?>
            <tr>
                <th scope="row"><?= $grupo->id ?></th>
                <td><?= $grupo->descricao ?></td>
                <td><?= $grupo->almoxarifado ?></td>
                <td><?= getAtivo($grupo->ativo == 's') ?></td>
                <td>
                    <?= anchor("grupos/$grupo->id/editar", 'Editar') ?>
                    <?= anchor("grupos/$grupo->id/excluir", 'Excluir') ?>
                </td>
            </tr>
        <?php endforeach ?>

    </tbody>
</table>

<?= $this->endSection() ?>