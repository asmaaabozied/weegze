<?php

namespace App\Http\Controllers\Admin;

use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\Report;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Report::orderBy('id')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->addColumn('product', function (Report $data) {
                $name = mb_strlen(strip_tags($data->product->name), 'utf-8') > 50 ? mb_substr(strip_tags($data->product->name), 0, 50, 'utf-8') . '...' : strip_tags($data->product->name);
                $product = '<a href="' . route('front.product', $data->product->slug) . '" target="_blank">' . $name . '</a>';
                return $product;
            })
            ->addColumn('reporter', function (Report $data) {
                $name = $data->user->name;
                return $name;
            })
            ->addColumn('title', function (Report $data) {
                $text = mb_strlen(strip_tags($data->title), 'utf-8') > 250 ? mb_substr(strip_tags($data->title), 0, 250, 'utf-8') . '...' : strip_tags($data->title);
                return $text;
            })
            ->addColumn('action', function (Report $data) {

                $delete = '';


                if (auth()->guard('admin')->user()->hasPermission('delete_reports')) {
                    $delete = '<a href="javascript:;" data-href="' . route('admin-report-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete">
                            <i class="fas fa-trash-alt"></i>
                      </a >';
                }


                return '<div class="action-list"><a href="' . route('admin-report-show', $data->id) . '" class="view details-width" > <i class="fas fa-eye"></i>' . trans('site.details') . '</a>
' . $delete . '</div>';
            })
            ->rawColumns(['product', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.report.index');
    }

    //*** GET Request
    public function show($id)
    {
        $data = Report::findOrFail($id);
        return view('admin.report.show', compact('data'));
    }


    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Report::findOrFail($id);
        $data->delete();
        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
