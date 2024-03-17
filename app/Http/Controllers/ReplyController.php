<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Requests\ReplyRequest;
use App\Models\Reply;
use Exception;
use Illuminate\Contracts\Database\Query\Expression;
use Illuminate\Support\Facades\DB;
use Mockery\Expectation;

class ReplyController extends Controller
{
    public function index()
    {
        $replys = Reply::query()->with('user', 'ticket')->get();
        return view('admin.pages.reply.index',compact('replys'));
    }

    public function create(){
        $tickets = Ticket::query()->bySubType('Open')->get();
        return view('admin.pages.reply.create',compact('tickets'));
    }

    public function store(ReplyRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();
            $data['user_id'] = auth()->id();
            $data['reply_date'] = now();
            $reply = Reply::create($data);
            $ticket = Ticket::findOrFail($data['ticket_id']);
            $ticket->update(['sub_type' => 'Waiting']);
            DB::commit();
            session()->flash('success', 'Reply added successfully');
            return redirect()->route('admin.reply.index');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Reply $reply){
        $reply->delete();
        session()->flash('success', 'Reply deleted successfully');
        return redirect()->route('admin.reply.index');
    }

}
