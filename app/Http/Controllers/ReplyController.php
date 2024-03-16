<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function index()
    {
        $tickets = Ticket::query()->bySubType('Open')->get();

        return view('admin.pages.reply.index');
    }
}
