<?php

namespace App\Http\Controllers;

use App\Models\type_travel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome()
    {
        return view('adminHome');
    }

    public function BookPg()
    {
        // $data['typetravels'] = Type_travel::orderBy('typetv_id', 'asc')->paginate(5);
        return view('bookpg');
    }

    public function BookActivity()
    {
        return view('bookactivity');
    }

    public function BookRoom()
    {
        // $data['typetravels'] = Type_travel::orderBy('typetv_id', 'asc')->paginate(5);
        return view('bookroom');
    }

    public function CustomerDB()
    {
        return view('customerdb');
    }

    public function CustomerInsert()
    {
        return view('customerinsert');
    }


}
