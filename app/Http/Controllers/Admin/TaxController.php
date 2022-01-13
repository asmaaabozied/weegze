<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tax;
use Yajra\DataTables\DataTables;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class TaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = Tax::orderBy('id','desc')->get();

         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)

                            ->addColumn('action', function(Tax $data) {

                                $edit = '';
                                $delete = '';
                                if (auth()->guard('admin')->user()->hasPermission('update_taxes')) {
                                    $edit = '<a  href="' . route('tax.edit', $data->id) . '" class="edit" >
                            <i class="fas fa-edit"></i>
                        </a>';
                                }

                                if (auth()->guard('admin')->user()->hasPermission('delete_taxes')) {
                                    $delete = '<a href="javascript:;" data-href="' . route('tax-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete">
                            <i class="fas fa-trash-alt"></i>
                      </a >';
                                }

                                return '<div class="action-list">
                       ' . $edit . ' ' . $delete . '
                 </div > ';
//                                return '<div class="action-list"><a href="' . route('tax.edit',$data->id) . '"> <i class="fas fa-edit"></i>'.trans('site.edit').'</a><a href="javascript:;" data-href="' . route('tax-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
                            })
                            ->rawColumns(['action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.tax.index');
    }

    //*** GET Request
    public function create()
    {

        return view('admin.tax.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
//        $rules = [
////               'photo'      => 'required|mimes:jpeg,jpg,png,svg',
//                ];
//
//        $validator = Validator::make($request->all(), $rules);
//
//        if ($validator->fails()) {
//          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
//        }
        //--- Validation Section Ends
        $request->validate([
            'discount' => 'required',
            'name:en' => 'required',
            'name:ar' => 'required',




        ]);
        //--- Logic Section
        $data = new Tax();
        $input = $request->all();

        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
//        $msg = 'New Data Added Successfully.'.'<a href="'.route("admin-blog-index").'">View Post Lists</a>';
        session()->flash('success', __('site.added_successfully'));

        return redirect(route("tax.index"));
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {

        $data = Tax::findOrFail($id);
        return view('admin.tax.edit',compact('data'));
    }

    public function show($id){


    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
//        $rules = [
////               'photo'      => 'mimes:jpeg,jpg,png,svg',
//                ];
//
//        $validator = Validator::make($request->all(), $rules);
//
//        if ($validator->fails()) {
//          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
//        }
        //--- Validation Section Ends
        $request->validate([
            'discount' => 'required',
            'name:en' => 'required',
            'name:ar' => 'required',




        ]);
        //--- Logic Section
        $data = Tax::findOrFail($id);
        $input = $request->all();
//            if ($file = $request->file('photo'))
//            {
//                $name = time().$file->getClientOriginalName();
//                $file->move('assets/images/blogs',$name);
//                if($data->photo != null)
//                {
//                    if (file_exists(public_path().'/assets/images/blogs/'.$data->photo)) {
//                        unlink(public_path().'/assets/images/blogs/'.$data->photo);
//                    }
//                }
//            $input['photo'] = $name;
//            }


        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section
        session()->flash('success', __('site.updated_successfully'));

//        $msg = 'Data Updated Successfully.'.'<a href="'.route("admin-blog-index").'">View Post Lists</a>';
        return redirect(route("tax.index"));
        //--- Redirect Section Ends
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Tax::findOrFail($id);
        //If Photo Doesn't Exist
        $data->delete();
        //--- Redirect Section
        session()->flash('success', __('site.deleted_successfully'));

        return back();
        //--- Redirect Section Ends
    }
}
