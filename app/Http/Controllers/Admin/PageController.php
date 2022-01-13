<?php

namespace App\Http\Controllers\Admin;

use Yajra\DataTables\DataTables;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Page::orderBy('id', 'desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->addColumn('header', function (Page $data) {
                $class = $data->header == 1 ? 'drop-success' : 'drop-danger';
                $s = $data->header == 1 ? 'selected' : '';
                $ns = $data->header == 0 ? 'selected' : '';
                return '<div class="action-list"><select class="process select droplinks ' . $class . '"><option data-val="1" value="' . route('admin-page-header', ['id1' => $data->id, 'id2' => 1]) . '" ' . $s . '>' . trans('site.Showed') . '</option><option data-val="0" value="' . route('admin-page-header', ['id1' => $data->id, 'id2' => 0]) . '" ' . $ns . '>' . trans('site.Not Showed') . '</option></select></div>';
            })
            ->addColumn('footer', function (Page $data) {
                $class = $data->footer == 1 ? 'drop-success' : 'drop-danger';
                $s = $data->footer == 1 ? 'selected' : '';
                $ns = $data->footer == 0 ? 'selected' : '';
                return '<div class="action-list"><select class="process select droplinks ' . $class . '"><option data-val="1" value="' . route('admin-page-footer', ['id1' => $data->id, 'id2' => 1]) . '" ' . $s . '>' . trans('site.Showed') . '</option><<option data-val="0" value="' . route('admin-page-footer', ['id1' => $data->id, 'id2' => 0]) . '" ' . $ns . '>' . trans('site.Not Showed') . '</option>/select></div>';
            })
            ->addColumn('action', function (Page $data) {

                $edit = '';
                $delete = '';
                if (auth()->guard('admin')->user()->hasPermission('update_pages')) {
                    $edit = '<a  href="' . route('admin-page-edit', $data->id) . '" class="edit" >
                            <i class="fas fa-edit"></i>
                        </a>';
                }

                if (auth()->guard('admin')->user()->hasPermission('delete_pages')) {
                    $delete = '<a href="javascript:;" data-href="' . route('admin-page-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete">
                            <i class="fas fa-trash-alt"></i>
                      </a >';
                }

                return '<div class="action-list">
                       ' . $edit . ' ' . $delete . '
                 </div > ';
//                return '<div class="action-list"><a href="' . route('admin-page-edit', $data->id) . '"> <i class="fas fa-edit"></i>' . trans('site.edit') . '</a><a href="javascript:;" data-href="' . route('admin-page-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['header', 'footer', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.page.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.page.create');
    }

    //*** POST Request
    public function store(Request $request)
    {

        $request->validate([
            'slug' => 'required',
            'title:en' => 'required',
            'title:ar' => 'required',
            'details:ar' => 'required',
            'details:en' => 'required',


        ]);
        //--- Validation Section
        $slug = $request->slug;
        $main = array('home', 'faq', 'contact', 'blog', 'cart', 'checkout');
//        if (in_array($slug, $main)) {
//        return response()->json(array('errors' => [ 0 => 'This slug has already been taken.' ]));
//        }
//        $rules = ['slug' => 'unique:pages'];
//        $customs = ['slug.unique' => 'This slug has already been taken.'];
//        $validator = Validator::make($request->all(), $rules, $customs);
//        if ($validator->fails()) {
//          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
//        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Page();
        $input = $request->all();

        if (!empty($request->meta_tag)) {
            $input['meta_tag'] = implode(',', $request->meta_tag);
        }
        if ($request->secheck == "") {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;
        }
        $data->fill($input)->save();
        //--- Logic Section Ends
        session()->flash('success', __('site.added_successfully'));

        //--- Redirect Section
//        $msg = 'New Data Added Successfully.'.'<a href="'.route("admin-page-index").'">View Page Lists</a>';
//        return response()->json($msg);
        return redirect(route("admin-page-index"));
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
        $data = Page::findOrFail($id);
        return view('admin.page.edit', compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        $request->validate([
            'slug' => 'required',
            'title:en' => 'required',
            'title:ar' => 'required',
            'details:ar' => 'required',
            'details:en' => 'required',


        ]);
        //--- Validation Section
        $slug = $request->slug;
        $main = array('home', 'faq', 'contact', 'blog', 'cart', 'checkout');
//        if (in_array($slug, $main)) {
//            return response()->json(array('errors' => [0 => 'This slug has already been taken.']));
//        }
//        $rules = ['slug' => 'unique:pages,slug,' . $id];
//        $customs = ['slug.unique' => 'This slug has already been taken.'];
//        $validator = Validator::make($request->all(), $rules, $customs);
//
//        if ($validator->fails()) {
//            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
//        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = Page::findOrFail($id);
        $input = $request->all();
        if (!empty($request->meta_tag)) {
            $input['meta_tag'] = implode(',', $request->meta_tag);
        } else {
            $input['meta_tag'] = null;
        }
        if ($request->secheck == "") {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;
        }
        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section
//        $msg = 'Data Updated Successfully.'.'<a href="'.route("admin-page-index").'">View Page Lists</a>';
//        return response()->json($msg);
        //--- Redirect Section Ends

        session()->flash('success', __('site.updated_successfully'));
        return redirect(route("admin-page-index"));
    }

    //*** GET Request Header
    public function header($id1, $id2)
    {
        $data = Page::findOrFail($id1);
        $data->header = $id2;
        $data->update();
    }

    //*** GET Request Footer
    public function footer($id1, $id2)
    {
        $data = Page::findOrFail($id1);
        $data->footer = $id2;
        $data->update();
    }


    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Page::findOrFail($id);
        $data->delete();
        //--- Redirect Section
        session()->flash('success', __('site.deleted_successfully'));
        return redirect(route("admin-page-index"));
        //--- Redirect Section Ends
    }
}
