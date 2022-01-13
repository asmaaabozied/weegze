<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class PermissionController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth:admin');
//    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Permission::orderBy('id', 'desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
//            <a href="javascript:;" data-href="' . route('admin-permissions-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a>
            ->addColumn('action', function (Permission $data) {
//                return '<div class="action-list"><a href="' . route('admin-permissions-edit', $data->id) . '"> <i class="fas fa-edit"></i>' . trans('site.edit') . '</a></div>';
            })
            ->rawColumns(['action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.permissions.index');
    }

    //*** GET Request
    public function create()
    {


        return view('admin.permissions.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
//        $rules = [
//            'photo' => '',
//        ];
//
//        $validator = Validator::make($request->all(), $rules);
//
//        if ($validator->fails()) {
//            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
//        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Permission();
        $input = $request->except('_token');
        $data->fill($input)->save();



        //--- Logic Section Ends

        //--- Redirect Section
//        $msg = 'New Data Added Successfully.<a href="'.route('admin-role-index').'">View Role Lists.</a>';
//        return response()->json($msg);
        session()->flash('success', __('site.added_successfully'));
        return redirect(route('admin-permisssions-index'));
        //--- Redirect Section Ends


    }

    //*** GET Request
    public function edit($id)
    {
        $data = Permission::findOrFail($id);


        return view('admin.permissions.edit', compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
//        $rules = [
//            'photo' => '',
//        ];
//
//        $validator = Validator::make(Input::all(), $rules);
//
//        if ($validator->fails()) {
//            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
//        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = Permission::findOrFail($id);
        $input = $request->except('_token');
        $data->update($input);

        //--- Logic Section Ends

        //--- Redirect Section
        session()->flash('success', __('site.updated_successfully'));
        return redirect(route('admin-permisssions-index'));
        //--- Redirect Section Ends

    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Permission::findOrFail($id);
        $data->delete();
        //--- Redirect Section
        session()->flash('success', __('site.deleted_successfully'));
        return back();        //--- Redirect Section Ends
    }
}
