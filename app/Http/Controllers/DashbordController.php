<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    //
    public function index () {



        return view('Dashbord',[
            'ideas' => Idea::orderBy('created_at', 'DESC')->paginate(5)
        ]);
    }
}
