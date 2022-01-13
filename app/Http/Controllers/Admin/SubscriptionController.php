<?php

namespace App\Http\Controllers\Admin;

use Yajra\DataTables\DataTables;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Subscription::orderBy('id', 'desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->editColumn('price', function (Subscription $data) {
                $price = round($data->price, 2);
                return $price;
            })
            ->editColumn('allowed_products', function (Subscription $data) {
                $allowed_products = $data->allowed_products == 0 ? "Unlimited" : $data->allowed_products;
                return $allowed_products;
            })
            ->addColumn('action', function (Subscription $data) {

                $edit = '';
                $delete = '';
                if (auth()->guard('admin')->user()->hasPermission('update_subscription')) {
                    $edit = '<a  href="' . route('admin-subscription-edit', $data->id) . '" class="edit" >
                            <i class="fas fa-edit"></i>
                        </a>';
                }

                if (auth()->guard('admin')->user()->hasPermission('delete_subscription')) {
                    $delete = '<a href="javascript:;" data-href="' . route('admin-subscription-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete">
                            <i class="fas fa-trash-alt"></i>
                      </a >';
                }

                return '<div class="action-list">
                       ' . $edit . ' ' . $delete . '
                 </div > ';
//                return '<div class="action-list"><a href="' . route('admin-subscription-edit', $data->id) . '" class="edit" > <i class="fas fa-edit"></i>' . trans('site.edit') . '</a><a href="javascript:;" data-href="' . route('admin-subscription-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.subscription.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.subscription.create');
    }

    //*** POST Request
    public function store(Request $request)
    {

        $request->validate([
            'price' => 'required',

            'currency' => 'required',

            'currency_code' => 'required',
            'valueday' => 'required|integer',
            'title:en' => 'required',
            'title:ar' => 'required',


        ]);
        //--- Logic Section
        $data = new Subscription();
        $input = $request->all();

        if ($input['limit'] == 0) {
            $input['allowed_products'] = 0;
        }

        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
        session()->flash('success', __('site.added_successfully'));
        return redirect(route('admin-subscription-index'));
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
        $data = Subscription::findOrFail($id);
        return view('admin.subscription.edit', compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        $request->validate([
            'price' => 'required',

            'currency' => 'required',

            'currency_code' => 'required',
            'valueday' => 'required|integer',
            'title:en' => 'required',
            'title:ar' => 'required',


        ]);
        //--- Logic Section
        $data = Subscription::findOrFail($id);
        $input = $request->all();
        if ($input['limit'] == 0) {
            $input['allowed_products'] = 0;
        }
        $data->update($input);
        //--- Logic Section Ends
        $data->subs()->update(['allowed_products' => $data->allowed_products]);

        //--- Redirect Section
        session()->flash('success', __('site.updated_successfully'));
        return redirect(route('admin-subscription-index'));
        //--- Redirect Section Ends
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Subscription::findOrFail($id);
        $data->delete();
        //--- Redirect Section
        session()->flash('success', __('site.deleted_successfully'));
        return redirect(route('admin-subscription-index'));
        //--- Redirect Section Ends
    }
}
