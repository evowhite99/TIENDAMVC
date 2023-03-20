<?php

class AdminPapeleraController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model('AdminPapelera');
    }

    public function index()
    {
        $session = new AdminSession();

        if ($session->getLogin()) {
            $data = [
                'titulo' => 'Papelera',
                'menu' => false,
                'admin' => true,
                'subtitle' => 'Papelera',
                'product' => $this->model->getProducts(),
                'users' => $this->model->getUsers()
            ];
            $this->view('admin/papelera/index', $data);
        } else {
            header('LOCATION:' . ROOT . 'admin');
        }

    }

    public function restoreProduct($id)
    {
        $session = new AdminSession();

        if ($session->getLogin()) {
            $this->model->getProductsUpdate($id);
            header('LOCATION:' . ROOT . 'adminPapelera');
        } else {
            header('LOCATION:' . ROOT . 'admin');
        }
    }

    public function restoreUsers($id)
    {
        $session = new AdminSession();

        if ($session->getLogin()) {
            $this->model->getUsersUpdate($id);
            header('LOCATION:' . ROOT . 'adminPapelera');
        } else {
            header('LOCATION:' . ROOT . 'admin');
        }
    }

}