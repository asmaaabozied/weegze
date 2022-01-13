<?php

namespace App\DataTables;

//use App\Helpers\DTHelper;

use App\Models\Message;
use App\Models\Order;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class inquiriesDataTable extends DataTable
{

    private $crudName = 'messages';


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
    public function query(Message $model)
    {
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
        return Message::all()->count();
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
            ->setTableId('messages' . '_datatables-table')
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


            Column::make('message')->title(trans('site.message')),




//            Column::make('pickup_location')->title(trans('site.locations')),

            Column::make('created_at')->title(trans('site.created_at')),



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
