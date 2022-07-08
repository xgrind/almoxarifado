<?= $this->extend('layout') ?>

<?= $this->section('conteudo') ?>

<?php if (isset($erros)) : ?>
    <?php foreach ($erros as $erro) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $erro ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endforeach ?>
<?php endif ?>


<?= form_open() ?>

<div class="mb-3">

    <?= form_label('Ativo', 'ativo', [
        'class' => 'form-label'
    ]) ?>


    <?= form_dropdown([
        'name' => 'ativo',
        'id' => 'ativo',
        'class' => 'form-select'
    ], [
        '' => '-- Selecione --',
        's' => 'Sim',
        'n' => 'Não'
    ], $almoxarifado->ativo) ?>

</div>

<div class="mb-3">

    <?= form_label('Descrição', 'descricao', [
        'class' => 'form-label'
    ]) ?>

    <?= form_textarea([
        'name' => 'descricao',
        'id' => 'descricao',
        'class' => 'form-control'
    ], $almoxarifado->descricao ?? '') ?>

</div>

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <?= form_submit([
        'value' => 'Atualizar',
        'class' => 'btn btn-primary mt-3 text-end'
    ]) ?>
</div>

<?= form_close() ?>


<?= $this->endSection() ?>