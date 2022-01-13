<?php

namespace App\Http\Controllers\Admin;

use Yajra\DataTables\DataTables;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class CurrencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Currency::orderBy('id')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->addColumn('action', function (Currency $data) {
                $edit = '';
                $delete = '';
                if (auth()->guard('admin')->user()->hasPermission('delete_currencies')) {

                    $delete = $data->id == 1 ? '' : '<a href="javascript:;" data-href="' . route('admin-currency-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a>';

                }
                if (auth()->guard('admin')->user()->hasPermission('update_currencies')) {
                    $edit = '<a  href="' . route('admin-currency-edit', $data->id) . '" class="edit" >
                            <i class="fas fa-edit"></i>
                        </a>';
                }
                $default = $data->is_default == 1 ? '<a><i class="fa fa-check"></i> ' . trans('site.Default') . '</a>' : '<a class="status" data-href="' . route('admin-currency-status', ['id1' => $data->id, 'id2' => 1]) . '">' . trans('site.Set Default') . '</a>';
                return '<div class="action-list">' . $edit . $delete . $default . '</div>';
            })
            ->rawColumns(['action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.currency.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.currency.create');
    }

    //*** POST Request
    public function store(Request $request)
    {

        $request->validate([
            'name:en' => 'required',
            'name:ar' => 'required',
            'value' => 'required|numeric|min:0'


        ]);
        //--- Logic Section
        $data = new Currency();
        $input = $request->all();
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
//        $msg = 'New Data Added Successfully.';

        session()->flash('success', __('site.added_successfully'));

        return redirect(route('admin-currency-index'));
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
        $data = Currency::findOrFail($id);
        return view('admin.currency.edit', compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {

        $request->validate([
            'name:en' => 'required',
            'name:ar' => 'required',
            'value' => 'required|numeric|min:0'


        ]);
        //--- Logic Section
        $data = Currency::findOrFail($id);
        $input = $request->all();
        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section
        session()->flash('success', __('site.updated_successfully'));

        return redirect(route('admin-currency-index'));
        //--- Redirect Section Ends
    }

    public function status($id1, $id2)
    {
        $data = Currency::findOrFail($id1);
        $data->is_default = $id2;
        $data->update();
        $data = Currency::where('id', '!=', $id1)->update(['is_default' => 0]);
        //--- Redirect Section
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        if ($id == 1) {
            return "You cant't remove the main currency.";
        }
        $data = Currency::findOrFail($id);
        if ($data->is_default == 1) {
            Currency::where('id', '=', 1)->update(['is_default' => 1]);
        }
        $data->delete();
        //--- Redirect Section
        session()->flash('success', __('site.deleted_successfully'));

        return back();
//        $msg = 'Data Deleted Successfully.';
//        return response()->json($msg);
        //--- Redirect Section Ends
    }

}
