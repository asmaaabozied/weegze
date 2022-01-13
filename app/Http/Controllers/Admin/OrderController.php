<?php

namespace App\Http\Controllers\Admin;

use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Models\AdminUserConversation;
use App\Models\Generalsetting;
use App\Models\Message;
use App\Models\Order;
use App\Models\OrderTrack;
use App\Models\User;
use App\Models\VendorOrder;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables($status)
    {
        if ($status == 'pending') {
            $datas = Order::where('status', '=', 'pending')->get();
        } elseif ($status == 'processing') {
            $datas = Order::where('status', '=', 'processing')->get();
        } elseif ($status == 'completed') {
            $datas = Order::where('status', '=', 'completed')->get();
        } elseif ($status == 'declined') {
            $datas = Order::where('status', '=', 'declined')->get();
        } else {
            $datas = Order::orderBy('id', 'desc')->get();
        }

        //--- Integrating This Collection Into Datatables
        return DataTables::of($datas)
            ->editColumn('id', function (Order $data) {
                $id = '<a href="' . route('admin-order-invoice', $data->id) . '">' . $data->order_number . '</a>';
                return $id;
            })
            ->editColumn('pay_amount', function (Order $data) {
                return $data->currency_sign . round($data->pay_amount * $data->currency_value, 2);
            })->editColumn('status', function (Order $data) {
                $class = $data->status == 'completed' ? 'drop-success' : 'drop-danger';
                $s = $data->status == 'pending' ? 'selected' : '';
                $ns = $data->status == 'declined' ? 'selected' : '';
                $nss = $data->status == 'processing' ? 'selected' : '';
                return '<div class="action-list"><select class="process select droplinks ' . $class . '">
                <option data-val="1" value="' . route('admin-order-status', ['id1' => $data->id, 'id2' => 'completed']) . '" ' . $class . '>' . trans('site.Completed') . '</option>
                <option data-val="0" value="' . route('admin-order-status', ['id1' => $data->id, 'id2' => 'pending']) . '" ' . $s . '>' . trans('site.Pending') . '</option>
                  <option data-val="1" value="' . route('admin-order-status', ['id1' => $data->id, 'id2' => 'processing']) . '" ' . $nss . '>' . trans('site.Processing') . '</option>
                <option data-val="0" value="' . route('admin-order-status', ['id1' => $data->id, 'id2' => 'declined']) . '" ' . $ns . '>' . trans('site.Declined') . '</option>

                </select></div>';
            })
            ->addColumn('action', function (Order $data) {
                $orders = '<a  href="' . route('admin-order-edit', $data->id) . '" class="delivery" ><i class="fas fa-dollar-sign"></i> ' . trans('site.edit') . '</a>';
                return '<div class="godropdown"><button class="go-dropdown-toggle"> ' . trans('site.action') . '<i class="fas fa-chevron-down"></i></button><div class="action-list"><a href="' . route('admin-order-show', $data->id) . '" > <i class="fas fa-eye"></i> ' . trans('site.details') .
                    '
                    '. $orders . '</div></div>';
            })
            ->rawColumns(['id', 'status', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function status($id1, $id2)
    {
        $data = Order::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }

    public function sendmessages(Request $request)
    {

        AdminUserConversation::create([
            'user_id' => Auth::id(),
            'type' => 'Ticket',
            'subject'=>$request->subject,
            'message'=>$request->message
            ]);

        session()->flash('success', __('site.messages.send_massage_successful'));

//        return redirect(route('admin-order-index'));

        return back();

    }

    public function index()
    {
        return view('admin.order.index');
    }

    public function edit($id)
    {
        $data = Order::find($id);
        return view('admin.order.delivery', compact('data'));
    }

    //*** POST Requestpending
    public function update(Request $request, $id)
    {

        //--- Logic Section
        $data = Order::findOrFail($id);

        $input = $request->all();
        if ($data->status == "completed") {

            // Then Save Without Changing it.
            $input['status'] = "completed";
            $data->update($input);
            //--- Logic Section Ends


            //--- Redirect Section
            session()->flash('success', __('site.updated_successfully'));
            return redirect(route('admin-order-index'));
            //--- Redirect Section Ends

        } else {
            if ($input['status'] == "completed") {

                foreach ($data->vendororders as $vorder) {
                    $uprice = User::findOrFail($vorder->user_id);
                    $uprice->current_balance = $uprice->current_balance + $vorder->price;
                    $uprice->update();
                }

                $gs = Generalsetting::findOrFail(1);
                if ($gs->is_smtp == 1) {
                    $maildata = [
                        'to' => $data->customer_email,
                        'subject' => 'Your order ' . $data->order_number . ' is Confirmed!',
                        'body' => "Hello " . $data->customer_name . "," . "\n Thank you for shopping with us. We are looking forward to your next visit.",
                    ];

                    $mailer = new GeniusMailer();
                    $mailer->sendCustomMail($maildata);
                } else {
                    $to = $data->customer_email;
                    $subject = 'Your order ' . $data->order_number . ' is Confirmed!';
                    $msg = "Hello " . $data->customer_name . "," . "\n Thank you for shopping with us. We are looking forward to your next visit.";
                    $headers = "From: " . $gs->from_name . "<" . $gs->from_email . ">";
                    mail($to, $subject, $msg, $headers);
                }
            }
            if ($input['status'] == "declined") {
                $gs = Generalsetting::findOrFail(1);
                if ($gs->is_smtp == 1) {
                    $maildata = [
                        'to' => $data->customer_email,
                        'subject' => 'Your order ' . $data->order_number . ' is Declined!',
                        'body' => "Hello " . $data->customer_name . "," . "\n We are sorry for the inconvenience caused. We are looking forward to your next visit.",
                    ];
                    $mailer = new GeniusMailer();
                    $mailer->sendCustomMail($maildata);
                } else {
                    $to = $data->customer_email;
                    $subject = 'Your order ' . $data->order_number . ' is Declined!';
                    $msg = "Hello " . $data->customer_name . "," . "\n We are sorry for the inconvenience caused. We are looking forward to your next visit.";
                    $headers = "From: " . $gs->from_name . "<" . $gs->from_email . ">";
                    mail($to, $subject, $msg, $headers);
                }

            }

            $data->update($input);

            if ($request->track_text) {
                $title = ucwords($request->status);
                $ck = OrderTrack::where('order_id', '=', $id)->where('title', '=', $title)->first();
                if ($ck) {
                    $ck->order_id = $id;
                    $ck->title = $title;
                    $ck->text = $request->track_text;
                    $ck->update();
                } else {
                    $data = new OrderTrack;
                    $data->order_id = $id;
                    $data->title = $title;
                    $data->text = $request->track_text;
                    $data->save();
                }


            }


            $order = VendorOrder::where('order_id', '=', $id)->update(['status' => $input['status']]);

            //--- Redirect Section

            session()->flash('success', __('site.updated_successfully'));
            return redirect(route('admin-order-index'));
//            $msg = 'Status Updated Successfully.';
//            return response()->json($msg);
            //--- Redirect Section Ends

        }

        //--- Redirect Section
        $msg = 'Status Updated Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends

    }

    public function pending()
    {
        return view('admin.order.pending');
    }

    public function processing()
    {
        return view('admin.order.processing');
    }

    public function completed()
    {
        return view('admin.order.completed');
    }

    public function declined()
    {
        return view('admin.order.declined');
    }

    public function show($id)
    {
        if (!Order::where('id', $id)->exists()) {
            return redirect()->route('admin.dashboard')->with('unsuccess', __('Sorry the page does not exist.'));
        }
        $order = Order::findOrFail($id);
        // $cart=$order->cart;

        $cart = unserialize(bzdecompress(utf8_decode($order->cart)));
        return view('admin.order.details', compact('order', 'cart'));
    }

    public function invoice($id)
    {
        $order = Order::findOrFail($id);
        $cart = unserialize(bzdecompress(utf8_decode($order->cart)));
        return view('admin.order.invoice', compact('order', 'cart'));
    }

    public function emailsub(Request $request)
    {
        $gs = Generalsetting::findOrFail(1);
        if ($gs->is_smtp == 1) {
            $data = 0;
            $datas = [
                'to' => $request->to,
                'subject' => $request->subject,
                'body' => $request->message,
            ];

            $mailer = new GeniusMailer();
            $mail = $mailer->sendCustomMail($datas);
            if ($mail) {
                $data = 1;
            }
        } else {
            $data = 0;
            $headers = "From: " . $gs->from_name . "<" . $gs->from_email . ">";
            $mail = mail($request->to, $request->subject, $request->message, $headers);
            if ($mail) {
                $data = 1;
            }
        }

        return response()->json($data);
    }

    public function printpage($id)
    {
        $order = Order::findOrFail($id);
        $cart = unserialize(bzdecompress(utf8_decode($order->cart)));
        return view('admin.order.print', compact('order', 'cart'));
    }

    public function license(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $cart = unserialize(bzdecompress(utf8_decode($order->cart)));
        $cart->items[$request->license_key]['license'] = $request->license;
        $order->cart = utf8_encode(bzcompress(serialize($cart), 9));
        $order->update();
        $msg = 'Successfully Changed The License Key.';
        return response()->json($msg);
    }
}
