<?= $this->extend('layout') ?>

<?= $this->section('conteudo') ?>

<?= show_erros($erros) ?>

<?= form_open() ?>

<div class="mb-3">    

    <?= form_label('Descrição', 'descricao', ['class' => 'form-label']) ?>

    <?= form_textarea([
        'name' => 'descricao',
        'id' => 'descricao',
        'class' => 'form-control'
    ], $almoxarifado->descricao ?? '') ?>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <?= form_submit([            
            'class' => 'btn btn-primary mt-3 text-end'
        ], 'Inserir') ?>       
    </div>

</div>

<?= form_close() ?>


<?= $this->endSection() ?>