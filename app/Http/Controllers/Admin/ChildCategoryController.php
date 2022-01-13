<?php

namespace App\Http\Controllers\Admin;

use Yajra\DataTables\DataTables;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class ChildCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Childcategory::orderBy('id', 'desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->addColumn('category', function (Childcategory $data) {
                return $data->subcategory->category->name;
            })
            ->addColumn('subcategory', function (Childcategory $data) {
                return $data->subcategory->name;
            })
            ->addColumn('status', function (Childcategory $data) {
                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                $s = $data->status == 1 ? 'selected' : '';
                $ns = $data->status == 0 ? 'selected' : '';
                return '<div class="action-list"><select class="process select droplinks ' . $class . '"><option data-val="1" value="' . route('admin-childcat-status', ['id1' => $data->id, 'id2' => 1]) . '" ' . $s . '>' . trans('site.active') . '</option><option data-val="0" value="' . route('admin-childcat-status', ['id1' => $data->id, 'id2' => 0]) . '" ' . $ns . '>' . trans('site.inactive') . '</option>/select></div>';
            })
            ->addColumn('attributes', function (Childcategory $data) {
                $buttons = '<div class="action-list"><a href="' . route('admin-attr-createForChildcategory', $data->id) . '" class="attribute"> <i class="fas fa-edit"></i>' . trans('site.create') . '</a>';
                if ($data->attributes()->count() > 0) {
                    $buttons .= '<a href="' . route('admin-attr-manage', $data->id) . '?type=childcategory' . '" class="edit"> <i class="fas fa-edit"></i>' . trans('site.Manage') . '</a>';
                }
                $buttons .= '</div>';

                return $buttons;
            })
            ->addColumn('action', function (Childcategory $data) {
                return '<div class="action-list"><a href="' . route('admin-childcat-edit', $data->id) . '" class="edit" > <i class="fas fa-edit"></i>' . trans('site.edit') . '</a><a href="javascript:;" data-href="' . route('admin-childcat-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['status', 'attributes', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }


    //*** GET Request
    public function index()
    {
        return view('admin.childcategory.index');
    }

    //*** GET Request
    public function create()
    {
        $cats = Category::all();
        return view('admin.childcategory.create', compact('cats'));
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
//        $rules = [
////            'slug' => 'unique:childcategories|regex:/^[a-zA-Z0-9\s-]+$/'
//                 ];
//        $customs = [
////            'slug.unique' => 'This slug has already been taken.',
////            'slug.regex' => 'Slug Must Not Have Any Special Characters.'
//                   ];
//        $validator = Validator::make($request->all(), $rules, $customs);
//
//        if ($validator->fails()) {
//          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
//        }
        //--- Validation Section Ends
        $request->validate([
            'name:en' => 'required',
            'name:ar' => 'required',


        ]);
        //--- Logic Section
        $data = new Childcategory();
        $input = $request->all();
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section

        session()->flash('success', __('site.added_successfully'));
        return redirect(route('admin-childcat-index'));
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
        $cats = Category::all();
        $subcats = Subcategory::all();
        $data = Childcategory::findOrFail($id);
        return view('admin.childcategory.edit', compact('data', 'cats', 'subcats'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
//        $rules = [
////            'slug' => 'unique:childcategories,slug,'.$id.'|regex:/^[a-zA-Z0-9\s-]+$/'
//                 ];
//        $customs = [
////            'slug.unique' => 'This slug has already been taken.',
////            'slug.regex' => 'Slug Must Not Have Any Special Characters.'
//                   ];
//        $validator = Validator::make($request->all(), $rules, $customs);
//
//        if ($validator->fails()) {
//          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
//        }
        //--- Validation Section Ends
        $request->validate([
            'name:en' => 'required',
            'name:ar' => 'required',


        ]);
        //--- Logic Section
        $data = Childcategory::findOrFail($id);
        $input = $request->all();
        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section
        session()->flash('success', __('site.updated_successfully'));
        return redirect(route('admin-childcat-index'));
        //--- Redirect Section Ends
    }

    //*** GET Request Status
    public function status($id1, $id2)
    {
        $data = Childcategory::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }

    //*** GET Request
    public function load($id)
    {
        $subcat = Subcategory::findOrFail($id);
        return view('load.childcategory', compact('subcat'));
    }


    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Childcategory::findOrFail($id);

        if ($data->attributes->count() > 0) {
            //--- Redirect Section
            session()->flash('success', __('site.deleted_successfully'));

            return back();
            //--- Redirect Section Ends
        }

        if ($data->products->count() > 0) {
            //--- Redirect Section
            session()->flash('success', __('site.deleted_successfully'));

            return back();
            //--- Redirect Section Ends
        }

        $data->delete();
        //--- Redirect Section
        session()->flash('success', __('site.deleted_successfully'));

        return back();
        //--- Redirect Section Ends
    }
}