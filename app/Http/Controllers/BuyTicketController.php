<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Models\MailAdmin;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuyTicketController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function buyTicket(Request $request)
    {
        $data = [
            'user_name' => $request->user_name,
            'number_phone' => $request->number_phone,
            'from' => $request->from,
            'to' => $request->to,
            'departure_date' => $request->departure_date,
            'return_date' => $request->return_date,
            'amount_adults' => $request->amount_adults,
            'amount_children_less_12' => $request->amount_children_less_12,
            'amount_children_less_2' => $request->amount_children_less_2,
            'package' => $request->package,
            'status' => $request->status,
        ];
        DB::table('ticket')->insert($data);
        session()->flash('success', 'Tiến hành đặt vé thành công. Chúng tôi sẽ sớm liên lạc lại cho bạn');
        $message = [
            'content' => 'Thông tin khách hàng',
            'user_name' => $request->user_name,
            'number_phone' => $request->number_phone,
            'from' => $request->from,
            'to' => $request->to,
            'departure_date' => $request->departure_date,
            'return_date' => $request->return_date,
            'amount_adults' => $request->amount_adults,
            'amount_children_less_12' => $request->amount_children_less_12,
            'amount_children_less_2' => $request->amount_children_less_2,
            'package' => $request->package
        ];
        $emails = User::all();
        SendEmail::dispatch($message, $emails)->delay(now()->addMinute(1));
        return redirect()->back();
    }

    public function addNewTicket(Request $request)
    {
        $data = [
            'from' => $request->from,
            'to' => $request->to,
            'status' => 2,
            'price' => $request->price,
            'user_update' => auth()->id()
        ];

        DB::table('ticket')
            ->insert($data);
        session()->put('different');
        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus($id, Request $request)
    {
        $data = [
            'status' => 1,
            'price' => $request->price,
            'user_update' => auth()->id()
        ];
        Ticket::where('id', $id)->update($data);
        return redirect()->route('get-all');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteTicket($id)
    {
        $ticket = $this->ticketQuery()->findOrFail($id);
        $ticket->delete();
        return response()->json(['message' => 'delete success'] );
    }

    public function search(Request $request)
    {
        $query = DB::table('ticket')
            ->where('number_phone', $request->number_phone)
            ->get();
        return view('get-all', compact('query'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getAllTicket()
    {
        $query1 = DB::table('ticket')->where('status', 0)->orderByDesc('id')->get();
        $query2 = DB::table('ticket')->where('status', 1)->orderByDesc('id')->get();
        $query3 = DB::table('ticket')->where('status', 2)->orderByDesc('id')->get();
        $revenue = Ticket::whereIn('status', [1, 2])
            ->select('price')->get();
        $total1 = 0;
        foreach ($revenue as $val) {
            $total1 += $val->price;
        }
        $revenue_by_user = Ticket::where('status', 1)
            ->where('user_update', auth()->id())
            ->select('price')->get();
        $total2 = 0;
        foreach ($revenue_by_user as $val) {
            $total2 += $val->price;
        }
         return view('get-all', compact('query1', 'query2', 'total1', 'total2', 'query3'));
    }

    public function ticketQuery()
    {
        return Ticket::query();
    }
}
