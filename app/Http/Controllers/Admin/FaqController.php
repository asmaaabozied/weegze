<?php

namespace App\Http\Controllers\Admin;

use Yajra\DataTables\DataTables;
use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Faq::orderBy('id', 'desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->editColumn('details', function (Faq $data) {
                $details = mb_strlen(strip_tags($data->details), 'utf-8') > 250 ? mb_substr(strip_tags($data->details), 0, 250, 'utf-8') . '...' : strip_tags($data->details);
                return $details;
            })
            ->addColumn('action', function (Faq $data) {

                $edit = '';
                $delete = '';
                if (auth()->guard('admin')->user()->hasPermission('update_Faq')) {
                    $edit = '<a  href="' . route('admin-faq-edit', $data->id) . '" class="edit" >
                            <i class="fas fa-edit"></i>
                        </a>';
                }

                if (auth()->guard('admin')->user()->hasPermission('delete_Faq')) {
                    $delete = '<a href="javascript:;" data-href="' . route('admin-faq-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete">
                            <i class="fas fa-trash-alt"></i>
                      </a >';
                }

                return '<div class="action-list">
                       ' . $edit . ' ' . $delete . '
                 </div > ';
//                return '<div class="action-list"><a href="' . route('admin-faq-edit', $data->id) . '"> <i class="fas fa-edit"></i>' . trans('site.edit') . '</a><a href="javascript:;" data-href="' . route('admin-faq-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.faq.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.faq.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section


        $request->validate([
            'title:en' => 'required',
            'title:ar' => 'required',


        ]);
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Faq();
        $input = $request->all();
        $data->fill($input)->save();
        //--- Logic Section Ends
        session()->flash('success', __('site.added_successfully'));

        return redirect(route("admin-faq-index"));
        //--- Redirect Section
        //
//        $msg = 'New Data Added Successfully.'.'<a href="'.route("admin-faq-index").'">View Faq Lists</a>';
//        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
        $data = Faq::findOrFail($id);
        return view('admin.faq.edit', compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
        $request->validate([
            'title:en' => 'required',
            'title:ar' => 'required',


        ]);
        //--- Validation Section Ends

        //--- Logic Section
        $data = Faq::findOrFail($id);
        $input = $request->all();
        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section

        session()->flash('success', __('site.updated_successfully'));
        return redirect(route('admin-faq-index'));
//        $msg = 'Data Updated Successfully.'.'<a href="'.route("admin-faq-index").'">View Faq Lists</a>';
//        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Faq::findOrFail($id);
        $data->delete();
        //--- Redirect Section
        session()->flash('success', __('site.deleted_successfully'));

        return back();
//        $msg = 'Data Deleted Successfully.';
//        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
