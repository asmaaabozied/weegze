<?php

namespace App\Http\Controllers\Admin;

use App\Models\coupanProduct;
use Validator;

use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Coupon::orderBy('id', 'desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->editColumn('type', function (Coupon $data) {
                $type = $data->type == 0 ? "Discount By Percentage" : "Discount By Amount";
                return $type;
            })
            ->editColumn('price', function (Coupon $data) {
                $price = $data->type == 0 ? $data->price . '%' : $data->price . '$';
                return $price;
            })
            ->addColumn('status', function (Coupon $data) {
                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                $s = $data->status == 1 ? 'selected' : '';
                $ns = $data->status == 0 ? 'selected' : '';
                return '<div class="action-list"><select class="process select droplinks ' . $class . '"><option data-val="1" value="' . route('admin-coupon-status', ['id1' => $data->id, 'id2' => 1]) . '" ' . $s . '>' . trans('site.active') . '</option><<option data-val="0" value="' . route('admin-coupon-status', ['id1' => $data->id, 'id2' => 0]) . '" ' . $ns . '>' . trans('site.inactive') . '</option>/select></div>';
            })
            ->addColumn('action', function (Coupon $data) {

                $edit = '';
                $delete = '';
                if (auth()->guard('admin')->user()->hasPermission('update_Coupons')) {
                    $edit = '<a  href="' . route('admin-coupon-edit', $data->id) . '" class="edit" >
                            <i class="fas fa-edit"></i>
                        </a>';
                }

                if (auth()->guard('admin')->user()->hasPermission('delete_Coupons')) {
                    $delete = '<a href="javascript:;" data-href="' . route('admin-coupon-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete">
                            <i class="fas fa-trash-alt"></i>
                      </a >';
                }

                return '<div class="action-list">
                       ' . $edit . ' ' . $delete . '
                 </div > ';
//                return '<div class="action-list"><a href="' . route('admin-coupon-edit', $data->id) . '"> <i class="fas fa-edit"></i>'.trans('site.edit').'</a><a href="javascript:;" data-href="' . route('admin-coupon-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['status', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.coupon.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.coupon.create');
    }

    //*** POST Request
    public function store(Request $request)
    {


        $rules = [
            'name' => 'required|string',
            'value' => 'required|min:0|numeric',
            'price' => 'nullable|min:0|numeric',
            'times' => 'nullable|min:0|numeric',
            'type' => 'nullable',

            'number' => 'required|min:0|numeric',
            'code' => 'required|min:0|numeric|unique:coupons',
            'start_date' => 'required|date|before:end_date|date_format:Y-m-d',
            'end_date' => 'required|date|after:start_date|date_format:Y-m-d',
        ];
        if ($request->input('type') == 1) {
            $rules['price'] = 'required|numeric|min:0';


        } elseif ($request->input('type') == 0) {

            $rules['price'] = 'required|numeric|min:0|max:100';

        }

        $request->validate($rules);


        //--- Logic Section
        $data = new Coupon();
        $input = $request->except('product_id');
        $input['start_date'] = Carbon::parse($input['start_date'])->format('Y-m-d');
        $input['end_date'] = Carbon::parse($input['end_date'])->format('Y-m-d');
        $data->fill($input)->save();
        if ($request->product_id) {


            foreach ($request->product_id as $product)
                coupanProduct::create(['product_id' => $product, 'coupan_id' => $data->id])->save();

        }
        //--- Logic Section Ends

        session()->flash('success', __('site.added_successfully'));
        return redirect(route("admin-coupon-index"));
        //--- Redirect Section
        //
        //
//        $msg = 'New Data Added Successfully.'.'<a href="'.route("admin-coupon-index").'">View Coupon Lists</a>';
//        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
        $data = Coupon::findOrFail($id);
        return view('admin.coupon.edit', compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
            'name' => 'required|string',
            'value' => 'required|min:0|numeric',
            'price' => 'nullable|min:0|numeric',
            'type' => 'nullable',
            'times' => 'nullable|min:0|numeric',

            'number' => 'required|min:0|numeric',
            'code' => 'required|min:0|numeric|unique:coupons',
            'start_date' => 'required|date|before:end_date|date_format:Y-m-d',
            'end_date' => 'required|date|after:start_date|date_format:Y-m-d',
        ];
        if ($request->input('type') == 1) {
            $rules['price'] = 'required|numeric|min:0';


        } elseif ($request->input('type') == 0) {

            $rules['price'] = 'required|numeric|min:0|max:100';

        }

        $request->validate($rules);
        //--- Validation Section Ends

        //--- Logic Section
        $data = Coupon::findOrFail($id);
        $input = $request->except('product_id');
        $input['start_date'] = Carbon::parse($input['start_date'])->format('Y-m-d');
        $input['end_date'] = Carbon::parse($input['end_date'])->format('Y-m-d');
        $data->update($input);

        if ($request->product_id) {


            coupanProduct::where('coupan_id', $data->id)->delete();
            foreach ($request->product_id as $product)
                coupanProduct::create(['product_id' => $product, 'coupan_id' => $data->id])->save();

        }
        //--- Logic Section Ends

        //--- Redirect Section
//        $msg = 'Data Updated Successfully.' . '<a href="' . route("admin-coupon-index") . '">View Coupon Lists</a>';
//        return response()->json($msg);

        session()->flash('success', __('site.updated_successfully'));
        return redirect(route('admin-coupon-index'));
        //--- Redirect Section Ends
    }

    //*** GET Request Status
    public function status($id1, $id2)
    {
        $data = Coupon::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }


    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Coupon::findOrFail($id);
        $data->delete();
        //--- Redirect Section
        session()->flash('success', __('site.deleted_successfully'));

        return back();
//        $msg = 'Data Deleted Successfully.';
//        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
