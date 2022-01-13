<?php

namespace App\Http\Controllers\Admin;

use App\Classes\GeniusMailer;
use App\DataTables\inquiriesDataTable;
use App\DataTables\OrderDatatables;
use App\DataTables\ordersDataTable;
use App\DataTables\productsDataTable;
use App\DataTables\UsersDataTable;
use App\DataTables\vendorDataTable;
use App\DataTables\visitorsDataTable;
use App\Http\Controllers\Controller;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function getReportorders(ordersDataTable $orderDataTable)
    {
        return $orderDataTable->render('admin.orderdatatable', [
            'title' => trans('site.orders'),
            'count' => $orderDataTable->count()
        ]);

    }

    public function getReportvendors(vendorDataTable $dataTable){
        return $dataTable->render('admin.datatable', [
            'title' => trans('site.sellers'),
            'count' => $dataTable->count()
        ]);

    }

    public function getReportproducts(productsDataTable $productsDataTable)
    {

        return $productsDataTable->render('admin.productdatatable', [
            'title' => trans('site.products'),
            'count' => $productsDataTable->count()
        ]);
    }

    public function getReportinquiries(inquiriesDataTable $inquiriesDataTable)
    {

        return $inquiriesDataTable->render('admin.datatable', [
            'title' => trans('site.inquiries'),
            'count' => $inquiriesDataTable->count()
        ]);
    }

    public function getReportvisitore(visitorsDataTable $dataTable)
    {


        return $dataTable->render('admin.datatable', [
            'title' => trans('site.visitors'),
            'count' => $dataTable->count()
        ]);
    }


}
