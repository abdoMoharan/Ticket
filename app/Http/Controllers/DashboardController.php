<?php
namespace App\Http\Controllers;


use App\Models\Album;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $tickets = Ticket::query()->count();

        return view('admin.pages.index',compact('tickets'));
    }
}
