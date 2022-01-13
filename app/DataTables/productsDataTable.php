<?php

namespace App\DataTables;

//use App\Helpers\DTHelper;

use App\Models\Order;
use App\Models\Product;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class productsDataTable extends DataTable
{

    private $crudName = 'products';


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
            ->editColumn('category_id', function ($model) {
                return (!empty($model->category->name)) ? $model->category->name : '';
            })
            ->editColumn('user_id', function ($model) {
                return (!empty($model->user->name)) ? $model->user->name : '';
            })
            ->editColumn('tax_id', function ($model) {
                return (!empty($model->tax->discount)) ? $model->tax->discount : '';
            })
            ->editColumn('status', function ($status) {

                if ($status->status == 1) {


                    return "active";
                } elseif ($status->status == 0) {

                    return "inactive";
                }

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
    public function query(Product $model)
    {

        if (!empty($this->request()->has('status') && $this->request()->has('start_at') && $this->request()->has('end_at'))) {
//            ->whereBetween('created_at', [$start, $end])

            return $model->newQuery()->where('status', $this->request()->get('status'));

        }


        return $model->query();
    }

//
    public function count()
    {
        return Product::all()->count();
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
            ->setTableId('products' . '_datatables-table')
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
            Column::make('price')->title(trans('site.price')),
            Column::make('views')->title(trans('site.views')),


            Column::make('tags')->title(trans('site.tags')),

            Column::make('tax_id')->title(trans('site.taxes')),

            Column::make('discount')->title(trans('site.discount')),

            Column::make('sale')->title(trans('site.sale')),

            Column::make('status')->title(trans('site.status')),

//            Column::make('size')->title(trans('site.size')),

            Column::make('sku')->title(trans('site.sku')),


            Column::make('product_type')->title(trans('site.type')),

            Column::make('category_id')->title(trans('site.category')),

            Column::make('user_id')->title(trans('site.users')),
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
