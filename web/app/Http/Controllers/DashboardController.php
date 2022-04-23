<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Http\Requests\StoreDashboardRequest;
use App\Http\Requests\UpdateDashboardRequest;
use App\Models\Admin;
use GuzzleHttp\Promise\Create;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    //method ini dipanggil dari route yang di trigger setelah user ada di link Dashboard
    public function index()
    {
        //ini merujuk ke folder views Dashboard.blade.php
        //sambil ngirim var judul
        return view('Home', [
            'judul' => 'Dashboard'
        ]);
    }

}
