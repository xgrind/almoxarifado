<?= $this->extend('layout') ?>

<?= $this->section('conteudo') ?>

<?= show_erros($erros) ?>

<?= form_open() ?>

<div class="mb-3">

    <?= form_label('Almoxarifado', 'almoxarifado', [
        'class' => 'form-label'
    ]) ?>

    <select class="form-select" aria-label="Grupo" name="almoxarifado_id">
        <option value="">-- Selecione --</option>

        <?php foreach ($almoxarifados as $almoxarifado) : ?>
            <option value="<?= $almoxarifado->id ?>">
                <?= $almoxarifado->descricao ?>
            </option>
        <?php endforeach ?>
    </select>

</div>

<div class="mb-3">

    <?= form_label('Descrição', 'descricao', [
        'class' => 'form-label'
    ]) ?>

    <?= form_textarea([
        'name' => 'descricao',
        'id' => 'descricao',
        'class' => 'form-control'
    ], $grupo->descricao ?? '') ?>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <?= form_submit([
            'class' => 'btn btn-primary mt-3 text-end'
        ], 'Inserir') ?>    
    </div>

</div>

<?= form_close() ?>


<?= $this->endSection() ?>