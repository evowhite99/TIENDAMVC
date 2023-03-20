<?php

class AdminPayController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model('AdminPay');
    }

    public function index()
    {
        $session = new AdminSession();

        if ($session->getLogin()) {
            $payment = $this->model->getAll();
            $data = [
                'titulo' => 'Métodos de pago',
                'menu' => false,
                'admin' => true,
                'subtitle' => 'Métodos de pago',
                'payment' => $payment,
            ];
            $this->view('admin/metodos/pagos', $data);
        } else {
            header('LOCATION:' . ROOT . 'admin');
        }
    }


    public function create()
    {
        $session = new AdminSession();

        if ($session->getLogin()) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_POST['name'];
                $code = $_POST['code'];

                if ($this->model->create($name, $code)) {
                    header('LOCATION:' . ROOT . 'adminPay');

                }
            } else {
                $data = [
                    'titulo' => 'Crear método de pago',
                    'menu' => false,
                    'admin' => true,
                ];
                $this->view('admin/metodos/create', $data);
            }
        } else {
            header('LOCATION:' . ROOT . 'admin');
        }
    }


    public function edit($id)
    {
        $session = new AdminSession();

        if ($session->getLogin()) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_POST['name'];
                $code = $_POST['code'];

                if ($this->model->edit($id, $name, $code)) {
                    header('LOCATION:' . ROOT . 'adminPay');

                }
            } else {
                $payment_method = $this->model->getById($id);
                $data = [
                    'titulo' => 'Editar método de pago',
                    'menu' => false,
                    'admin' => true,
                    'payment_method' => $payment_method,
                ];
                $this->view('admin/metodos/edit', $data);
            }
        } else {
            header('LOCATION:' . ROOT . 'admin');
        }
    }


    public function delete($id)
    {
        $session = new AdminSession();
        if ($session->getLogin()) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($this->model->delete($id)) {
                    header('LOCATION:' . ROOT . 'adminPay');

                }
            } else {
                $data = [
                    'titulo' => 'Eliminar método de pago',
                    'menu' => false,
                    'admin' => true,
                    'payment' => $id,
                ];
                $this->view('admin/metodos/delete', $data);
            }
        } else {
            header('LOCATION:' . ROOT . 'admin');
        }
    }

}