<?= $this->extend('layout') ?>

<?= $this->section('conteudo') ?>

<?= show_erros($erros) ?>

<?= form_open() ?>

<div class="mb-3">

    <?= form_label('Grupo', 'grupo_id', [
        'class' => 'form-label'
    ]) ?>

    <select class="form-select" aria-label="Grupo" name="grupo_id">
        <option value="">-- Selecione --</option>

        <?php foreach ($grupos as $grupo) : ?>
            <option value="<?= $grupo->id ?>"
                <?= set_select('grupo_id', $grupo->id, $grupo->id == $produto->grupo_id) ?>>
                <?= $grupo->descricao ?>
            </option>
        <?php endforeach ?>
    </select>

</div>

<div class="mb-3">

    <?= form_label('Nome', 'nome', [
        'class' => 'form-label'
    ]) ?>

    <?= form_input([
        'name' => 'nome',
        'id' => 'nome',
        'class' => 'form-control'
    ], $produto->nome ?? '') ?>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <?= form_submit([
            'class' => 'btn btn-primary mt-3 text-end'
        ], 'Inserir') ?>    
    </div>

</div>

<?= form_close() ?>


<?= $this->endSection() ?>