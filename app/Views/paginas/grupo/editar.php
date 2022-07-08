<?= $this->extend('layout') ?>

<?= $this->section('conteudo') ?>

<?= show_erros($erros) ?>

<?= form_open() ?>

<div class="mb-3">

    <?= form_label('Almoxarifado', 'almoxarifado', ['class' => 'form-label']) ?>

    <div class="row">

        <div class="col-md-6 ">
            <select class="form-select" aria-label="Grupo" name="almoxarifado_id">
                <option value="">-- Selecione --</option>

                <?php foreach ($almoxarifados as $almoxarifado) : ?>
                    <option value="<?= $almoxarifado->id ?>" 
                        <?= set_select('almoxarifado_id', $almoxarifado->id, $almoxarifado->id == $grupo->almoxarifado_id) ?>>
                        <?= $almoxarifado->descricao ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="col-md-6">
            <?= form_dropdown([
                'name' => 'ativo',
                'id' => 'ativo',
                'class' => 'form-select'
            ], listAtivo(), $grupo->ativo) ?>
        </div>
    </div>

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
        ], 'Atualizar') ?>      
    </div>

</div>

<?= form_close() ?>


<?= $this->endSection() ?>