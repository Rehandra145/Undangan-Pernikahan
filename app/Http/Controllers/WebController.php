<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class WebController extends Controller
{
    public function index(){
        $event = Event::first();
        return view('dashboard.web.index', compact('event'));
    }

    public function store(Request $request)
    {
        $maxInstances = 1;

        Event::truncate();

        $request->validate([
            'groom_name' => 'required|string|max:255',
            'bride_name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'place' => 'required|string|max:255',
            'maps' => 'required|url',
            'embed_maps' => 'required|string|max:2000'
        ]);

        // Ubah huruf pertama setiap kata di 'name' menjadi kapital
        $formatted_groom_name = ucwords(strtolower($request->groom_name));
        $formatted_bride_name = ucwords(strtolower($request->bride_name));

        Event::create([
            'groom_name' => $formatted_groom_name,
            'bride_name' => $formatted_bride_name,
            'date' => $request->date,
            'time' => $request->time,
            'place' => $request->place,
            'maps' => $request->maps,
            'embed_maps' => $request->embed_maps
        ]);

        return redirect()->route('web.create')->with('success', 'Event berhasil dibuat');
    }

    public function create(){
        return view('dashboard.web.create');
    }
}
