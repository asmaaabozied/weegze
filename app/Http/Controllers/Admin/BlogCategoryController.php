<?php

namespace App\Http\Controllers\Admin;

use Yajra\DataTables\DataTables;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class BlogCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = BlogCategory::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->addColumn('action', function(BlogCategory $data) {

                                $edit = '';
                                $delete = '';
                                if (auth()->guard('admin')->user()->hasPermission('update_Blogs')) {
                                    $edit = '<a  href="' . route('admin-cblog-edit', $data->id) . '" class="edit" >
                            <i class="fas fa-edit"></i>
                        </a>';
                                }

                                if (auth()->guard('admin')->user()->hasPermission('delete_Blogs')) {
                                    $delete = '<a href="javascript:;" data-href="' . route('admin-cblog-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete">
                            <i class="fas fa-trash-alt"></i>
                      </a >';
                                }

                                return '<div class="action-list">
                       ' . $edit . ' ' . $delete . '
                 </div > ';
//                                return '<div class="action-list"><a href="' . route('admin-cblog-edit',$data->id) . '" class="edit" > <i class="fas fa-edit"></i>'.trans('site.edit').'</a><a href="javascript:;" data-href="' . route('admin-cblog-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
                            })
                            ->toJson();//--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.cblog.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.cblog.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
//        $rules = [
////               'name:ar' => 'unique:blog_categories',
////               'slug' => 'unique:blog_categories'
//                ];
//        $customs = [
//               'name.unique' => 'This name has already been taken.',
//               'slug.unique' => 'This slug has already been taken.'
//                   ];
//        $validator = Validator::make(Input::all(), $rules, $customs);
//        if ($validator->fails()) {
//          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
//        }
        //--- Validation Section Ends
        $request->validate([
            'slug' => 'required',
            'name:en' => 'required',
            'name:ar' => 'required',




        ]);
        //--- Logic Section
        $data = new BlogCategory;
        $input = $request->all();
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
        session()->flash('success', __('site.added_successfully'));

      return back();
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
        $data = BlogCategory::findOrFail($id);
        return view('admin.cblog.edit',compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
        $request->validate([
            'slug' => 'required',
            'name:en' => 'required',
            'name:ar' => 'required',




        ]);
        //--- Validation Section Ends

        //--- Logic Section
        $data = BlogCategory::findOrFail($id);
        $input = $request->all();
        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section
        session()->flash('success', __('site.updated_successfully'));

        return back();
        //--- Redirect Section Ends

    }

    //*** GET Request
    public function destroy($id)
    {
        $data = BlogCategory::findOrFail($id);

        //--- Check If there any blogs available, If Available Then Delete it
        if($data->blogs->count() > 0)
        {
            foreach ($data->blogs as $element) {
                $element->delete();
            }
        }
        $data->delete();
        //--- Redirect Section
        session()->flash('success', __('site.deleted_successfully'));

        return back();
        //--- Redirect Section Ends
    }
}
