<?php

namespace App\Http\Controllers\Admin;

use Intervention\Image\Facades\Image;
use Yajra\DataTables\DataTables;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = Blog::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->editColumn('photo', function(Blog $data) {
                                $photo = $data->photo ? url('assets/images/blogs/'.$data->photo):url('assets/images/noimage.png');
                                return '<img src="' . $photo . '" alt="Image">';
                            })
                            ->addColumn('action', function(Blog $data) {

                                $edit = '';
                                $delete = '';
                                if (auth()->guard('admin')->user()->hasPermission('update_Blogs')) {
                                    $edit = '<a  href="' . route('admin-blog-edit', $data->id) . '" class="edit" >
                            <i class="fas fa-edit"></i>
                        </a>';
                                }

                                if (auth()->guard('admin')->user()->hasPermission('delete_Blogs')) {
                                    $delete = '<a href="javascript:;" data-href="' . route('admin-blog-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete">
                            <i class="fas fa-trash-alt"></i>
                      </a >';
                                }

                                return '<div class="action-list">
                       ' . $edit . ' ' . $delete . '
                 </div > ';

//                                    return '<div class="action-list"><a href="' . route('admin-blog-edit',$data->id) . '"> <i class="fas fa-edit"></i>'.trans('site.edit').'</a><a href="javascript:;" data-href="' . route('admin-blog-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
                            })
                            ->rawColumns(['photo', 'action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.blog.index');
    }

    //*** GET Request
    public function create()
    {
        $cats = BlogCategory::all();
        return view('admin.blog.create',compact('cats'));
    }

    //*** POST Request
    public function store(Request $request)
    {
//        //--- Validation Section
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
            'photo' => 'required',
            'title:en' => 'required',
            'title:ar' => 'required',




        ]);
        //--- Logic Section
        $data = new Blog();
        $input = $request->all();
        if ($file = $request->file('photo'))
         {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images/blogs',$name);
            $input['photo'] = $name;
        }
        if (!empty($request->meta_tag))
         {
            $input['meta_tag'] = implode(',', $request->meta_tag);
         }
        if (!empty($request->tags))
         {
            $input['tags'] = implode(',', $request->tags);
         }
        if ($request->secheck == "")
         {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;
         }
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
//        $msg = 'New Data Added Successfully.'.'<a href="'.route("admin-blog-index").'">View Post Lists</a>';
        session()->flash('success', __('site.added_successfully'));

        return redirect(route("admin-blog-index"));
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
        $cats = BlogCategory::all();
        $data = Blog::findOrFail($id);
        return view('admin.blog.edit',compact('data','cats'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        $request->validate([
//            'photo' => 'required',
            'title:en' => 'required',
            'title:ar' => 'required',




        ]);
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

        //--- Logic Section
        $data = Blog::findOrFail($id);
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




        if (!empty($request->meta_tag))
         {
            $input['meta_tag'] = implode(',', $request->meta_tag);
         }
        else {
            $input['meta_tag'] = null;
         }
        if (!empty($request->tags))
         {
            $input['tags'] = implode(',', $request->tags);
         }
        else {
            $input['tags'] = null;
         }
        if ($request->secheck == "")
         {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;
         }
        $data->update($input);


        if ($file = $request->file('photo'))
        {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images/blogs',$name);
            $data->photo = $name;
            $data->save();
        }

//        if($request->photo) {
//
//            $thumbnail = $request->photo;
//            $filename = time() . '.' . $thumbnail->getClientOriginalName();
//            $thumbnail->move('assets/images/blogs',$filename);
////            Image::make($thumbnail)->resize(300, 300)->save('assets/images/blogs' . $filename);
//            $data->photo  = $filename;
//            $data->save();
//        }
        //--- Logic Section Ends

        //--- Redirect Section
        session()->flash('success', __('site.updated_successfully'));

//        $msg = 'Data Updated Successfully.'.'<a href="'.route("admin-blog-index").'">View Post Lists</a>';
        return redirect(route("admin-blog-index"));
        //--- Redirect Section Ends
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Blog::findOrFail($id);
        //If Photo Doesn't Exist
        if($data->photo == null){
            $data->delete();
            //--- Redirect Section
            session()->flash('success', __('site.deleted_successfully'));

            return back();
//--- Redirect Section Ends
        }
        //If Photo Exist
        if (file_exists(public_path().'/assets/images/blogs/'.$data->photo)) {
            unlink(public_path().'/assets/images/blogs/'.$data->photo);
        }
        $data->delete();
        //--- Redirect Section
        session()->flash('success', __('site.deleted_successfully'));

        return back();
        //--- Redirect Section Ends
    }
}
