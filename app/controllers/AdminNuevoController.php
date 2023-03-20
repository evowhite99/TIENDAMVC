<?php

class AdminNuevoController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model('AdminNuevo');
    }

    public function index()
    {
        $session = new AdminSession();

        if ($session->getLogin()) {

            $users = $this->model->getUsers();

            $data = [
                'titulo' => 'Administración de Usuarios',
                'menu' => false,
                'admin' => true,
                'users' => $users,
            ];

            $this->view('admin/nuevaSeccion/nuevo', $data);
        } else {
            header('LOCATION:' . ROOT . 'admin');
        }

    }

    public function show($id)
    {
        $session = new AdminSession();

        if ($session->getLogin()) {

            $user = $this->model->getUserById($id);

            $data = [
                'titulo' => 'Administración de Usuarios',
                'menu' => false,
                'admin' => true,
                'user' => $user,
            ];

            $this->view('admin/nuevaSeccion/nuevoShow', $data);
        } else {
            header('LOCATION:' . ROOT . 'admin');
        }

    }

    public function edit($id)
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $is_admin = isset($_POST['is_admin']) ? 1 : 0;

            $first_name = $_POST['first_name'] ?? '';
            $last_name_1 = $_POST['last_name_1'] ?? '';
            $last_name_2 = $_POST['last_name_2'] ?? '';
            $email = $_POST['email'] ?? '';
            $password1 = $_POST['password1'] ?? '';
            $password2 = $_POST['password2'] ?? '';
            $address = $_POST['address'] ?? '';
            $city = $_POST['city'] ?? '';
            $state = $_POST['state'] ?? '';
            $zipcode = $_POST['zipcode'] ?? '';
            $country = $_POST['country'] ?? '';


            if ($first_name == '') {
                array_push($errors, 'El nombre del usuario es requerido');
            }
            if ($email == '') {
                array_push($errors, 'El email es requerido');
            }

            if ( ! empty($password1) || ! empty($password2)) {
                if ($password1 != $password2) {
                    array_push($errors, 'Las contraseñas no coinciden');
                }
            }
            if ($last_name_1 == '') {
                array_push($errors, 'El primer apellido es requerido');
            }
            if ($last_name_2 == '') {
                array_push($errors, 'El segundo apellido es requerido');
            }

            if ($address == '') {
                array_push($errors, 'La dirección es requerida');
            }
            if ($city == '') {
                array_push($errors, 'La ciudad es requerida');
            }
            if ($state == '') {
                array_push($errors, 'La provincia es requerida');
            }
            if ($zipcode == '') {
                array_push($errors, 'El código postal es requerido');
            }
            if ($country == '') {
                array_push($errors, 'El país es requerido');
            }

            if ( ! $errors ) {
                $data = [
                    'id' => $id,
                    'first_name' => $first_name,
                    'last_name_1' => $last_name_1,
                    'last_name_2' => $last_name_2,
                    'email' => $email,
                    'password' => $password1,
                    'address'	=> $address,
                    'city'		=> $city,
                    'state'		=> $state,
                    'zipcode'	=> $zipcode,
                    'country'	=> $country,
                    'is_admin'  => $is_admin,

                ];
                $errors = $this->model->setUser($data);
                if ( ! $errors ) {
                    header("location:" . ROOT . 'adminNuevo');
                }
            }
        }

        $user = $this->model->getUserById($id);
        $data = [
            'titulo' => 'Usuarios - Editar',
            'menu' => false,
            'admin' => true,
            'data' => $user,
            'errors' => $errors,
        ];

        $this->view('admin/nuevaSeccion/nuevoEdit', $data);
    }

    public function delete($id)
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = $this->model->delete($id);
            if ( ! $errors ) {
                header('location:' . ROOT . 'adminNuevo');
            }
        }
        $user = $this->model->getUserById($id);
        $data = [
            'titulo' => 'Usuarios - Eliminación',
            'menu' => false,
            'admin' => true,
            'data' => $user,
            'errors' => $errors,
        ];
        $this->view('admin/nuevaSeccion/nuevoDelete', $data);
    }
}