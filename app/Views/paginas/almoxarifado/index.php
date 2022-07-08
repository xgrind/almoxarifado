<?= $this->extend('layout') ?>

<?= $this->section('conteudo') ?>

<?= show_session() ?>

<?= anchor('almoxarifados/novo', 'Novo', ['class' => 'btn btn-primary']) ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Descrição</th>
            <th scope="col">Ativo</th>
            <th scope="col">Opções</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($almoxarifados as $almoxarifado) : ?>
            <tr>
                <th scope="row"><?= $almoxarifado->id ?></th>
                <td><?= $almoxarifado->descricao ?></td>
                <td><?= getAtivo($almoxarifado->ativo) ?></td>
                <td>
                    <?= anchor("almoxarifados/$almoxarifado->id/editar", 'Editar') ?>
                    <?= anchor("almoxarifados/$almoxarifado->id/excluir", 'Excluir') ?>
                </td>
            </tr>
        <?php endforeach ?>

    </tbody>
</table>

<?= $this->endSection() ?>