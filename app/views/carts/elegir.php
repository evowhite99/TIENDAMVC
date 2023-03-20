<?php include_once(VIEWS . 'header.php') ?>
    <div class="card" id="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Iniciar sesión</a></li>
                <li class="breadcrumb-item">Datos de envío</li>
                <li class="breadcrumb-item"><a href="#">Forma de pago</a></li>
                <li class="breadcrumb-item"><a href="#">Verifica los datos</a></li>
            </ol>
        </nav>
        <div class="card-header">
            <h1>Datos de envío</h1>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group text-left">
                    <a href="<?= ROOT ?>cart/paymentmode/" class="btn btn-success">Ir a metodos de pago</a>
                </div>
            </form>

            <form action="<?= ROOT ?>cart/address/" method="POST">

                <div class="form-group text-left">
                    <input type="submit" value="Cambiar dirección" class="btn btn-success mt-2">
                </div>
            </form>
        </div>

    </div>

<?php include_once(VIEWS . 'footer.php') ?>