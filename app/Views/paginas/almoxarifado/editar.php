<?= $this->extend('layout') ?>

<?= $this->section('conteudo') ?>

<?= show_erros($erros) ?>

<?= form_open() ?>

<div class="mb-3">

    <?= form_label('Ativo', 'ativo', ['class' => 'form-label']) ?>

    <?= form_dropdown([
        'name' => 'ativo',
        'id' => 'ativo',
        'class' => 'form-select'
    ], listAtivo(), $almoxarifado->ativo) ?>

</div>

<div class="mb-3">

    <?= form_label('Descrição', 'descricao', ['class' => 'form-label']) ?>

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