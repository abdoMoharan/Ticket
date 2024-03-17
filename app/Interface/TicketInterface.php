<?php
namespace App\Interface;

use App\Models\Ticket;


interface TicketInterface
{
public function index();
public function create();
public function store($request);
public function edit(Ticket $ticket);
public function update($request, $ticket);
public function destroy(Ticket $ticket);
public function changeStatus($request);
}
