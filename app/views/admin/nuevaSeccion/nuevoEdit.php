<?php include_once(VIEWS . 'header.php')?>
    <div class="card p-4 bg-light">
        <div class="card-header">
            <h1 class="text-center">Edición de un usuario</h1>
        </div>
        <div class="card-body">
            <form action="<?= ROOT ?>adminNuevo/edit/<?= $data['data']->id ?>" method="POST">
                <div class="form-group text-left">
                    <label for="first_name">Nombre:</label>
                    <input type="text" name="first_name" class="form-control"
                           placeholder="Escribe tu nombre" required
                           value="<?= $data['data']->first_name ?? '' ?>"
                    >
                </div>

                <div class="form-group text-left">
                    <label for="is_admin">¿Es administrador?</label>
                    <input type="checkbox" name="is_admin" value="1" <?php if ($data['data']->is_admin == 1) echo 'checked' ?>>
                </div>


                <div class="form-group text-left">
                    <label for="last_name_1">Apellido 1:</label>
                    <input type="text" name="last_name_1" class="form-control"
                           placeholder="Escribe tu primer apellido" required
                           value="<?= $data['data']->last_name_1 ?? '' ?>"
                    >
                </div>
                <div class="form-group text-left">
                    <label for="last_name_2">Apellido 2:</label>
                    <input type="text" name="last_name_2" class="form-control"
                           placeholder="Escribe tu segundo apellido" required
                           value="<?= $data['data']->last_name_2 ?? '' ?>"
                    >
                </div>
                <div class="form-group text-left">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" name="email" class="form-control"
                           placeholder="Escribe el correo electrónico" required
                           value="<?= $data['data']->email ?? '' ?>"
                    >
                </div>
                <div class="form-group text-left">
                    <label for="password1">Clave de acceso: (dejar en blanco si no desea modificarla)</label>
                    <input type="password" name="password1" class="form-control"
                           placeholder="Escribe tu contraseña">
                </div>
                <div class="form-group text-left">
                    <label for="password2">Clave de acceso:</label>
                    <input type="password" name="password2" class="form-control"
                           placeholder="Repite tu contraseña">
                </div>

                <div class="form-group text-left">
                    <label for="address">Direccion:</label>
                    <input type="text" name="address" class="form-control"
                           placeholder="Escribe la direccion" required
                           value="<?= $data['data']->address ?? '' ?>"
                    >
                </div>

                <div class="form-group text-left">
                    <label for="city">Ciudad:</label>
                    <input type="text" name="city" class="form-control"
                           placeholder="Escribe la ciudad" required
                           value="<?= $data['data']->city ?? '' ?>"
                    >
                </div>

                <div class="form-group text-left">
                    <label for="state">Provincia:</label>
                    <input type="text" name="state" class="form-control"
                           placeholder="Escribe la provincia" required
                           value="<?= $data['data']->state ?? '' ?>"
                    >
                </div>

                <div class="form-group text-left">
                    <label for="zipcode">Codigo postal:</label>
                    <input type="text" name="zipcode" class="form-control"
                           placeholder="Escribe el codigo postal" required
                           value="<?= $data['data']->zipcode ?? '' ?>"
                    >
                </div>

                <div class="form-group text-left">
                    <label for="country">Pais:</label>
                    <input type="text" name="country" class="form-control"
                           placeholder="Escribe el pais" required
                           value="<?= $data['data']->country ?? '' ?>"
                    >
                </div>

                <div class="form-group text-left">
                    <input type="submit" value="Enviar" class="btn btn-success">
                    <a href="<?= ROOT ?>adminNuevo" class="btn btn-info">Regresar</a>
                </div>
            </form>
        </div>
        <div class="card-footer">

        </div>
    </div>
<?php include_once(VIEWS . 'footer.php')?>