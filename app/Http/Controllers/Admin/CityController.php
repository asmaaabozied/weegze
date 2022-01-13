<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Country;
use Yajra\DataTables\DataTables;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = City::get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->addColumn('action', function (City $data) {

                $edit = '';
                $delete = '';
                if (auth()->guard('admin')->user()->hasPermission('update_geographies')) {
                    $edit = '<a  href="' . route('city.edit', $data->id) . '" class="edit" >
                            <i class="fas fa-edit"></i>
                        </a>';
                }

                if (auth()->guard('admin')->user()->hasPermission('delete_geographies')) {
                    $delete = '<a href="javascript:;" data-href="' . route('city.destroy', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete">
                            <i class="fas fa-trash-alt"></i>
                      </a >';
                }

                return '<div class="action-list">
                       ' . $edit . ' ' . $delete . '
                 </div > ';
                //                                return '<div class="action-list"><a  href="' . route('admin-cat-edit',$data->id) . '" class="edit" > <i class="fas fa-edit"></i></a><a href="javascript:;" data-href="' . route('admin-cat-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';

//                                return '<div class="action-list"><a  href="' . route('country.edit',$data->id) . '" class="edit" > <i class="fas fa-edit"></i></a><a href="javascript:;" data-href="' . route('country.destroy',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }


    public function show()
    {


    }

    //*** GET Request
    public function index()
    {
        return view('admin.city.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.city.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
//        $rules = [
////            'photo' => 'mimes:jpeg,jpg,png,svg',
////            'slug' => 'unique:categories|regex:/^[a-zA-Z0-9\s-]+$/'
//                 ];
//        $customs = [
////            'photo.mimes' => 'Icon Type is Invalid.',
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
            'code' => 'required',
            'name:en' => 'required',
            'name:ar' => 'required',


        ]);
        //--- Logic Section
        $data = new City();
        $input = $request->all();

        $data->fill($input)->save();
        //--- Logic Section Ends
        session()->flash('success', __('site.added_successfully'));
        return redirect(route('city.index'));
        //--- Redirect Section
//        $msg = 'New Data Added Successfully.';
//        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
        $data = City::findOrFail($id);
        return view('admin.city.edit', compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
//        $rules = [
////        	'photo' => 'mimes:jpeg,jpg,png,svg',
////        	'slug' => 'unique:categories,slug,'.$id.'|regex:/^[a-zA-Z0-9\s-]+$/'
//        		 ];
//        $customs = [
////        	'photo.mimes' => 'Icon Type is Invalid.',
////        	'slug.unique' => 'This slug has already been taken.',
////            'slug.regex' => 'Slug Must Not Have Any Special Characters.'
//        		   ];
//        $validator = Validator::make($request->all(), $rules, $customs);
//
//        if ($validator->fails()) {
//          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
//        }
        //--- Validation Section Ends
        $request->validate([
            'code' => 'required',
            'name:en' => 'required',
            'name:ar' => 'required',


        ]);
        //--- Logic Section
        $data = City::findOrFail($id);
        $input = $request->all();


        $data->update($input);
        //--- Logic Section Ends
        session()->flash('success', __('site.updated_successfully'));
        return redirect(route('city.index'));

        //--- Redirect Section
//        $msg = 'Data Updated Successfully.';
//        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request Status


    //*** GET Request Delete
    public function destroy($id)
    {
        $data = City::findOrFail($id);


        $data->delete();
        //--- Redirect Section
        session()->flash('success', __('site.deleted_successfully'));
        return redirect(route('city.index'));
        //--- Redirect Section Ends
    }
}
