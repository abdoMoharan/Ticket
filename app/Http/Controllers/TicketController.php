<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Interface\TicketInterface;
use App\Http\Requests\TicketRequest;

class TicketController extends Controller
{
    public TicketInterface  $ticket;
    public function __construct(TicketInterface $ticket)
    {
        $this->ticket = $ticket;
    }
    public function index()
    {

        return $this->ticket->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->ticket->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketRequest $request)
    {
        return $this->ticket->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        $ticket->load('user');
        return $this->ticket->edit($ticket);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TicketRequest $request, Ticket $ticket)
    {
        return $this->ticket->update($request,$ticket);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        return $this->ticket->destroy($ticket);
    }
    public function changeStatus(Request $request){
        return $this->ticket->changeStatus($request);
    }
}
