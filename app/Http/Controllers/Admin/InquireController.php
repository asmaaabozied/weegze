<?php

namespace App\Http\Controllers\Admin;

use App\Models\Childcategory;
use App\Models\Message;
use App\Models\Subcategory;
use Yajra\DataTables\DataTables;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Gallery;
use App\Models\Attribute;
use App\Models\AttributeOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Validator;
use Image;
use DB;

class InquireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    //*** JSON Request
    public function datatables()
    {
        $datas = Message::orderBy('id', 'desc')->get();

        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
//
            ->addColumn('action', function (Message $data) {
                $delete = '';


                if (auth()->guard('admin')->user()->hasPermission('delete_inquiries')) {
                    $delete = '<a href="javascript:;" data-href="' . route('admin-inquiries-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete">
                            <i class="fas fa-trash-alt"></i>
                      </a >';
                }


                return '<div class="action-list">' . $delete . '
<a  href="' . route('admin-showinquiries-index', $data->id) . '" ><i class="fas fa-eye"></i></a>
</div>';

            })
            ->rawColumns(['action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** JSON Request


    //*** GET Request
    public function index()
    {
        return view('admin.inquires.index');
    }

    public function show($id)
    {

        $data = Message::find($id);

        return view('admin.inquires.show', compact('data'));


    }


    //*** GET Request
    public function destroy($id)
    {

        $data = Message::findOrFail($id);

        $data->delete();
        //--- Redirect Section
        session()->flash('success', __('site.deleted_successfully'));
        return back();
        //--- Redirect Section Ends

// PRODUCT DELETE ENDS
    }

}
