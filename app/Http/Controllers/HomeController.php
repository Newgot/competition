<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\PositionWorker;
use App\Models\Worker;
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
        $positions = Position::all();
        $workers = Worker::all();
        $positionsWorkers = PositionWorker::all();
        return view('home', [
            'wokrers' =>$workers,
            'positions' =>$positions,
            'positionsWorkers' => $positionsWorkers,
        ]);
    }

    public function positionBindWorker(Request $request)
    {
        PositionWorker::create($request->all());
        return redirect(route('home'));
    }
}
