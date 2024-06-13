<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class Jobs extends Controller
{
    public function list(Request $request)
    {
        Paginator::useBootstrap();
        $title = $request->get('title');
        $location = $request->get('location');
        $fullTime = $request->get('full_time');
        
        $query = DB::table('jobs')
        ->where('title', 'LIKE', '%' . $title . '%')
        ->where('location', 'LIKE', '%' . $location . '%');

        if (!is_null($fullTime)) {
            $query->where('type', 'on' ? 1 : 0);
        }
    
        $list = $query->orderBy('title', 'asc')->paginate(5);

        return view('dashboard', ['jobs' => $list]);
    }

    public function add()
    {
        return view('/add-job');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'company' => 'required',
            'type',
            'location' => 'required',
            'img',
            'url',
            'apply',
            'description',
        ]);
       DB::table('jobs')->insert([
            "title" => $request["title"],
            "company" => $request["company"],
            "type" => $request["type"] === "on" ? 1 : 0,
            "location" => $request["location"],
            "img" => $request["img"],
            "url" => $request["url"],
            "apply" => $request["apply"],
            "description" => $request["description"]
        ]);
        return redirect('/');
    }
}
