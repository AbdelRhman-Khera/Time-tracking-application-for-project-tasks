<?php

namespace App\Http\Controllers;

use App\Models\Project;
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
        $events =[];
        $projects = Project::all();
        foreach ($projects as $project) {
            $color ='#'.str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
            $events[] =[
                'title'=> $project->name,
                'start'=> $project->from->format('Y-m-d'),
                'end'=> $project->to->addDay()->format('Y-m-d'),
                'url'=> route('projects.show',$project->id),
                'backgroundColor'=> $color,
                'borderColor'=> $color,
            ];
        }
        // dd($projects,$events);
        return view('home',compact('events'));
    }
}
