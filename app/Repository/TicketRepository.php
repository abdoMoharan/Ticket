<?php
namespace App\Repository;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Interface\TicketInterface;
use App\Http\Requests\TicketRequest;

class TicketRepository implements TicketInterface
{
    public function index()
    {
        $tickets = Ticket::query()->with('user')->get();
        return view('admin.pages.tickets.index',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($request)
    {
        $data = $request->validated();
        Ticket::create($data);
        session()->flash('success', 'Ticket Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        $ticket->load('user');
        return view('admin.pages.tickets.edit',compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($request,  $ticket)
    {

        $data = $request->validated();
        $ticket->update($data);
        session()->flash('success', 'Ticket Updated Successfully');
        return redirect()->route('admin.tickets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        session()->flash('success', 'Ticket Deleted Successfully');
        return redirect()->route('admin.tickets.index');
    }

    public function changeStatus($request){
        $data = $request->validate([
            'ticket_id' => 'required',
            'sub_type' => 'required'
        ]);

        $ticket = Ticket::findOrFail($data['ticket_id']);
        $ticket->update(['sub_type' => $data['sub_type']]);
        session()->flash('success', 'Ticket Status Changed Successfully');
        return redirect()->route('admin.tickets.index');
    }
}
