<?php

namespace App\Http\Controllers\Admin;

use App\Models\Currency_Product;
use App\Models\Discount;
use App\Models\Product;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\DataTables;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class DiscountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables(Request $request)
    {

            $datas = Discount::orderBy('id', 'desc')->get();

        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->addColumn('action', function (Discount $data) {

                $edit = '';
                $delete = '';
                if (auth()->guard('admin')->user()->hasPermission('update_discountss')) {
                    $edit = '<a  href="' . route('admin-discounts-edit', $data->id) . '" class="edit" >
                            <i class="fas fa-edit"></i>
                        </a>';
                }

                if (auth()->guard('admin')->user()->hasPermission('delete_discountss')) {
                    $delete = '<a href="javascript:;" data-href="' . route('admin-discounts-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete">
                            <i class="fas fa-trash-alt"></i>
                      </a >';
                }

                return '<div class="action-list">
                       ' . $edit . ' ' . $delete . '
                 </div > ';
//                return '<div class="action-list"><a href="' . route('admin-discounts-edit', $data->id) . '"> <i class="fas fa-edit"></i>' . trans('site.edit') . '</a><a href="javascript:;" data-href="' . route('admin-discounts-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.discounts.index');
    }

    //*** GET Request
    public function create()
    {

        return view('admin.discounts.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        $rules = [
            'type' => 'required',

            'name:en' => 'required',
            'name:ar' => 'required',
            'start_at' => 'required|date|before:end_at|date_format:Y-m-d',
            'end_at' => 'required|date|after:start_at|date_format:Y-m-d',
            'discount' => '',
        ];
        if ($request->input('type') == "Fixed value") {
            $rules['discount'] = 'required|numeric|min:0';


        }elseif($request->input('type') == "Percentage"){

            $rules['discount'] = 'required|numeric|min:0|max:100';

        }

        $request->validate($rules);

        //--- Logic Section
        $data = new Discount();
        $input = $request->except('discount_id');

        $data->fill($input)->save();


        foreach ($request->discount_id as $key)


            Product::updateOrCreate([
                'id' => $key
            ], [
                'discount_id' => $data->id,
                'discount' => $data->discount,
                'typetax_id'=>$data->type,
            ]);

        //--- Logic Section Ends

        //--- Redirect Section
        session()->flash('success', __('site.added_successfully'));

        return redirect(route("admin-discounts-index"));
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {

        $data = Discount::findOrFail($id);
        return view('admin.discounts.edit', compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {

        $request->validate([
              'discount' => 'required',

            'name:en' => 'required',
            'name:ar' => 'required',
            'start_at' => 'required|date|before:end_at|date_format:Y-m-d',
            'end_at' => 'required|date|after:start_at|date_format:Y-m-d',

        ]);

        //--- Logic Section
        $data = Discount::findOrFail($id);
        $input = $request->all();


        $data->update($input);

        foreach ($request->discount_id as $key)


            Product::updateOrCreate([
                'id' => $key
            ], [
                'discount_id' => $data->id,
                'discount' => $data->discount,
                'typetax_id'=>$data->type,

            ]);


        //--- Redirect Section
        session()->flash('success', __('site.updated_successfully'));

//        $msg = 'Data Updated Successfully.'.'<a href="'.route("admin-blog-index").'">View Post Lists</a>';
        return redirect(route("admin-discounts-index"));
        //--- Redirect Section Ends
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Discount::findOrFail($id);
        //If Photo Doesn't Exist

        $data->delete();
        //--- Redirect Section
        session()->flash('success', __('site.deleted_successfully'));

        return back();
        //--- Redirect Section Ends
    }
}
