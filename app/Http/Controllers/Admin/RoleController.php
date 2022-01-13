<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use App\Permission_role;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class RoleController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth:admin');
//    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Role::orderBy('id', 'desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->addColumn('section', function (Role $data) {
                $details = str_replace('_', ' ', $data->section);
                $details = ucwords($details);
                return '<div>' . $details . '</div>';
            })
            ->addColumn('action', function (Role $data) {
                $edit = '';
                $delete = '';
                if (auth()->guard('admin')->user()->hasPermission('update_roles')) {
                    $edit = '<a  href="' . route('admin-role-edit', $data->id) . '" class="edit" >
                            <i class="fas fa-edit"></i>
                        </a>';
                }

                if (auth()->guard('admin')->user()->hasPermission('delete_roles')) {
                    $delete = '<a href="javascript:;" data-href="' . route('admin-role-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete">
                            <i class="fas fa-trash-alt"></i>
                      </a >';
                }

                return '<div class="action-list">
                       ' . $edit . ' ' . $delete . '
                 </div > ';

//                return '<div class="action-list"><a href="' . route('admin-role-edit', $data->id) . '"> <i class="fas fa-edit"></i>' . trans('site.edit') . '</a><a href="javascript:;" data-href="' . route('admin-role-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['section', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
//        return Auth::guard('admin')->user();
        return view('admin.role.index');
    }

    //*** GET Request
    public function create()
    {
        $models = ['clients','contact_us', 'Faq', 'Vendor Verifications', 'message', 'products', 'orders', 'categories', 'sliders', 'users', 'pages', 'roles', 'settings', 'services', 'inquiries', 'geographies', 'taxes', 'discountss', 'currencies', 'staff', 'subscription', 'reports', 'vendors', 'Coupons', 'Blogs', 'email-templates', 'paymentgateway'];
        $maps = ['create', 'update', 'read', 'delete'];


        return view('admin.role.create', compact('models', 'maps'));
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
        $data = new Role();
        $input = $request->except('_token', 'section');
        $data->fill($input)->save();

        if (!empty($request->section)) {
            $data->syncPermissions($request->section);
        }

        //--- Logic Section Ends

        //--- Redirect Section
//        $msg = 'New Data Added Successfully.<a href="'.route('admin-role-index').'">View Role Lists.</a>';
//        return response()->json($msg);
        session()->flash('success', __('site.added_successfully'));
        return redirect(route('admin-role-index'));
        //--- Redirect Section Ends


    }

    //*** GET Request
    public function edit($id)
    {
        $data = Role::findOrFail($id);
        $models = ['clients','contact_us', 'Faq', 'Vendor Verifications', 'message', 'products', 'orders', 'categories', 'sliders', 'users', 'pages', 'roles', 'settings', 'services', 'inquiries', 'geographies', 'taxes', 'discountss', 'currencies', 'staff', 'subscription', 'reports', 'vendors', 'Coupons', 'Blogs', 'email-templates', 'paymentgateway'];
        $maps = ['create', 'update', 'read', 'delete'];


        return view('admin.role.edit', compact('data', 'maps', 'models'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
//        return $request;
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
        $data = Role::findOrFail($id);
        $input = $request->except('_token', 'section');
        $data->update($input);
        if ($request->section) {


            if (!empty($request->section)) {
                $data->syncPermissions($request->section);
            }
        } else {
            Permission_role::where('role_id', $data->id)->delete();
        }
        //--- Logic Section Ends

        //--- Redirect Section
        session()->flash('success', __('site.updated_successfully'));
        return redirect(route('admin-role-index'));
        //--- Redirect Section Ends

    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Role::findOrFail($id);
        $data->delete();
        //--- Redirect Section
        session()->flash('success', __('site.deleted_successfully'));
        return back();        //--- Redirect Section Ends
    }
}
