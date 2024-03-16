<?php
namespace App\Http\Controllers;


use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.pages.index');
    }
}
