<?php

namespace App\Http\Controllers\Admin;

use Yajra\DataTables\DataTables;
use App\Models\Pickup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class PickupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = Pickup::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->addColumn('action', function(Pickup $data) {
                                return '<div class="action-list"><a href="' . route('admin-pick-edit',$data->id) . '" class="edit" > <i class="fas fa-edit"></i>'.trans('site.edit').'</a><a href="javascript:;" data-href="' . route('admin-pick-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
                            })
                            ->toJson();//--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.pickup.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.pickup.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
//        $rules = [
//               'location' => 'unique:pickups',
//                ];
//        $customs = [
//               'location.unique' => 'This location has already been taken.',
//                   ];
//        $validator = Validator::make(Input::all(), $rules, $customs);
//        if ($validator->fails()) {
//          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
//        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Pickup;
        $input = $request->all();
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
        session()->flash('success', __('site.added_successfully'));
        return redirect(route('admin-pick-index'));
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
        $data = Pickup::findOrFail($id);
        return view('admin.pickup.edit',compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
//        $rules = [
//               'location' => 'unique:pickups,location,'.$id
//                ];
//        $customs = [
//               'location.unique' => 'This location has already been taken.',
//                   ];
//        $validator = Validator::make(Input::all(), $rules, $customs);
//        if ($validator->fails()) {
//          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
//        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = Pickup::findOrFail($id);
        $input = $request->all();
        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section
        session()->flash('success', __('site.updated_successfully'));
        return redirect(route('admin-pick-index'));
        //--- Redirect Section Ends

    }

    //*** GET Request
    public function destroy($id)
    {
        $data = Pickup::findOrFail($id);
        $data->delete();
        //--- Redirect Section
        session()->flash('success', __('site.deleted_successfully'));
        return back();
        //--- Redirect Section Ends
    }
}
