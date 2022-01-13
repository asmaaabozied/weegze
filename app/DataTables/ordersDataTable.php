<?php

namespace App\DataTables;

//use App\Helpers\DTHelper;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ordersDataTable extends DataTable
{

    private $crudName = 'orders';


    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', function ($model) {
                return (!empty($model->created_at)) ? $model->created_at->diffForHumans() : '';
            })
            ->addColumn('action', function ($model) {
                $actions = '';

                return $actions;
            });

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Location $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model, Request $request)
    {
//        $start = Carbon::parse($this->request()->has('start_at'))->format('Y-m-d');
//
//        $end = Carbon::parse($this->request()->has('end_at'))->format('Y-m-d');

        if (!empty($this->request()->has('status') && $this->request()->has('start_at') && $this->request()->has('end_at'))) {
//            ->whereBetween('created_at', [$start, $end])

            return $model->newQuery()->where('status', $this->request()->get('status'));

        }
        return $model->query();
    }

//    public function all()
//    {
//        return Order::all();
//
//    }
//
    public function count()
    {
        return Order::all()->count();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {

        return $this->builder()
//            ->setTableId('orders-table')
            ->setTableId('orders' . '_datatables-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(


                Button::make('csv'),
                Button::make('excel'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload'),
                Button::make('export')

            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

            Column::make('id'),
            Column::make('order_number')->title(trans('site.number')),
            Column::make('created_at')->title(trans('site.created_at')),
            Column::make('shipping_cost')->title(trans('site.cost')),


            Column::make('customer_email')->title(trans('site.email')),

            Column::make('customer_name')->title(trans('site.name')),

            Column::make('pay_amount')->title(trans('site.amount')),

            Column::make('totalQty')->title(trans('site.totals')),

            Column::make('status')->title(trans('site.status')),

            Column::make('customer_address')->title(trans('site.address')),

            Column::make('customer_country')->title(trans('site.country')),


//            Column::make('pickup_location')->title(trans('site.locations')),

            Column::make('customer_phone')->title(trans('site.phone')),


            Column::make('method')->title(trans('site.method')),

//                Column::computed('image')
//                    ->exportable(false)
//                    ->printable(false)
//                    ->width(120)
//                    ->addClass('text-center')
//                    ->title(trans('site.image')),
//            Column::computed('action')
//                ->exportable(false)
//                ->printable(false)
//                ->width(120)
//                ->addClass('text-center')
//                ->title(trans('site.action')),
        ];

    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return ucfirst($this->crudName) . 'Datatables_' . date('YmdHis');
    }
}
