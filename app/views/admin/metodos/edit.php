<?php include_once(VIEWS . 'header.php') ?>
    <div class="card" id="container">
        <div class="card-header">
            <h1><?= $data['titulo'] ?></h1>
        </div>
        <div class="card-body">
            <form action="<?= ROOT ?>adminPay/edit/<?= $data['payment_method']->id ?>" method="POST">
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= $data['payment_method']->name ?>" required>
                </div>
                <div class="form-group">
                    <label for="code">Código:</label>
                    <input type="text" name="code" id="code" class="form-control" value="<?= $data['payment_method']->code ?>" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Guardar cambios" class="btn btn-primary">
                </div>
            </form>
            <td class="text-center">
                <a href="<?= ROOT ?>adminPay"
                   class="btn btn-danger"
                >Volver</a>
            </td>
        </div>
    </div>
<?php include_once(VIEWS . 'footer.php') ?>