<?php

namespace App\DataTables;

//use App\Helpers\DTHelper;

use App\Models\User;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class vendorDataTable extends DataTable
{

    private $crudName = 'users';


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
    public function query(User $model)
    {

        return $model->where('type', 'vendor')->newQuery();
    }


    public function count()
    {
        return User::where('type', 'vendor')->count();
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
            ->setTableId('users' . '_datatables-table')
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
            Column::make('name')->title(trans('site.name')),
            Column::make('email')->title(trans('site.email')),
            Column::make('phone')->title(trans('site.phone')),
            Column::make('address')->title(trans('site.address')),


            Column::make('shop_name')->title(trans('site.shop_name')),


            Column::make('shop_address')->title(trans('site.shop_address')),

            Column::make('shop_number')->title(trans('site.shop_number')),

            Column::make('reg_number')->title(trans('site.number')),

            Column::make('owner_name')->title(trans('site.owner_name')),

            Column::make('shop_message')->title(trans('site.shop_message')),

            Column::make('created_at')->title(trans('site.created_at')),


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
