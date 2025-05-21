<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;

class WebController extends Controller
{
    public function index()
    {
        $pemilik = Auth::id();
        $event = Event::where("user_id", $pemilik)->first();

        if (!$event) {
            $user = Auth::user();
            $name = $user->name;

            $formatted_groom_name = "Aqul";
            $formatted_bride_name = "Nesa";

            $event = Event::create([
                'groom_name' => $formatted_groom_name,
                'bride_name' => $formatted_bride_name,
                'date' => now()->addMonth()->format('Y-m-d'),
                'time' => '10:00:00',
                'place' => 'Lokasi Pernikahan Anda',
                'maps' => 'https://maps.google.com/',
                'embed_maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.6664463015976!2d106.82496361476884!3d-6.1753923955388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2e764b12d%3A0x3d2ad6e1e0e9bcc8!2sMonumen%20Nasional!5e0!3m2!1sid!2sid!4v1621930493243!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>', // Embed default untuk peta
                'user_id' => Auth::id(),
            ]);
        }
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
            'embed_maps' => $request->embed_maps,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('web.create')->with('success', 'Event berhasil dibuat');
    }

    public function create()
    {
        return view('dashboard.web.create');
    }
}
