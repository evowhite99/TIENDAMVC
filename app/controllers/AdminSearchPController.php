<?php

class AdminSearchPController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model('Search');
    }

    public function products()
    {
        $session = new AdminSession();

        $search = $_POST['search'] ?? '';

        if ($search != '') {
            $dataSearch = $this->model->getProducts($search);

            $data = [
                'titulo' => 'Buscador de productos',
                'subtitle' => 'Resultado de la búsqueda',
                'admin' => true,
                'data' => $dataSearch,
                'menu' => false,
            ];

            $this->view('admin/search/search', $data);
        } else {
            header('location:' . ROOT);
        }
    }
}