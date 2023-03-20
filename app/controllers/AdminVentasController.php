<?php

class AdminVentasController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model('AdminVentas');
    }

    public function index() {
        $session = new AdminSession();
        if ($session->getLogin()) {
            $ventas = $this->model->getSales();
            $data = [
                'titulo' => 'Ventas',
                'menu' => false,
                'admin' => true,
                'subtitule' => 'Ventas',
                'ventas' => $ventas,
            ];
            $this->view('admin/ventas/index', $data);
        } else {
            header('LOCATION:'. ROOT . 'admin');
        }
    }
    public function show($user_id, $sale_date) {
        $session = new AdminSession();
        if ($session->getLogin()) {
            $decoded_sale_date = urldecode($sale_date);
            $salesDetails = $this->model->getSalesDetails($user_id, $decoded_sale_date);
            $data = [
                'titulo' => 'Ventas - Mostrar detalles',
                'menu' => false,
                'admin' => true,
                'subtitule' => 'Ventas - Mostrar detalles ',
                'salesDetails' => $salesDetails,
            ];
            $this->view('admin/ventas/ventasDetalles', $data);
        } else {
            header('LOCATION:'. ROOT . 'admin');
        }
    }


}