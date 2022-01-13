<?php

namespace App\DataTables;


use App\Visit;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class visitorsDataTable extends DataTable
{

    private $crudName = 'visitors';


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

            ->editColumn('product_id', function ($model) {
                return (!empty($model->product->name)) ? $model->product->name : '';
            })
            ->editColumn('blog_id', function ($model) {
                return (!empty($model->blog->title)) ? $model->blog->title : '';
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
    public function query(Visit $model)
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
        return Visit::all()->count();
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
            ->setTableId('visitors' . '_datatables-table')
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
            Column::make('ip')->title(trans('site.ip')),
            Column::make('country')->title(trans('site.country')),
            Column::make('city')->title(trans('site.city')),


            Column::make('state')->title(trans('site.regions')),
            Column::make('type')->title(trans('site.type')),

            Column::make('product_id')->title(trans('site.products')),
            Column::make('blog_id')->title(trans('site.Blogs')),

            Column::make('postal_code')->title(trans('site.code')),

            Column::make('lat')->title(trans('site.latitude')),

            Column::make('lon')->title(trans('site.longitude')),

            Column::make('default1')->title(trans('zipCode')),

            Column::make('currency')->title(trans('site.currency')),


            Column::make('iso_code')->title(trans('site.key')),

//            Column::make('default1')->title(trans('site.default')),


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
