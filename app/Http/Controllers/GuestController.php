<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Event;
use App\Models\Story;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guests = Guest::where('user_id', Auth::id())->get();
        $total = Guest::where('user_id', Auth::id())->count();
        $pagin = Guest::where('user_id', Auth::id())->paginate(10);
        $hadir = Guest::where('user_id', Auth::id())->where('status', 'hadir')->count();
        $nggak = Guest::where('user_id', Auth::id())->where('status', 'tidak hadir')->count();
        $belum = Guest::where('user_id', Auth::id())->where('status', 'menunggu')->count();
        return view('dashboard.guest.index', compact('guests', 'total', 'hadir', 'nggak', 'belum', 'pagin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.guest.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255'
        ]);

        $formattedName = ucwords(strtolower($request->name));

        Guest::create([
            'name' => $formattedName,
            'alamat' => $request->alamat,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('guest.index')->with('success', 'Guest created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id, $slug)
    {
        $comments = Guest::where('user_id', Auth::id())->whereNotNull('comment')->where('comment', '!=', '')->get();
        $guest = Guest::where("user_id", $id)->where("slug", $slug)->first();
        // dd($slug);
        $event = Event::first();
        $stories = Story::all();
        $gallery = Gallery::all();

        if ($event) {
        preg_match('/src="([^"]+)"/', $event->embed_maps, $matches);
        $event->embed_maps_url = $matches[1] ?? '';
        }

        return view('front.index', compact('guest', 'slug', 'event', 'stories', 'gallery', 'comments'));
    }

    public function showNative()
    {
        $guests = Guest::all();
        $event = Event::first();
        $stories = Story::all();
        $gallery = Gallery::all();

        if ($event) {
        preg_match('/src="([^"]+)"/', $event->embed_maps, $matches);
        $event->embed_maps_url = $matches[1] ?? '';
        }

        return view('front.index', compact('guests', 'event', 'stories', 'gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $guest = Guest::findOrFail($id);
        return view('dashboard.guest.edit', compact('guest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255'
        ]);

        // Ubah huruf pertama setiap kata di 'name' menjadi kapital
        $formattedName = ucwords(strtolower($request->name));

        $guest = Guest::findOrFail($id);
        $guest->update([
            'name' => $formattedName,
            'alamat' => $request->alamat
        ]);

        return redirect()->route('guest.index')->with('success', 'Guest updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guest = Guest::findOrFail($id);
        $guest->delete();

        return redirect()->route('guest.index')->with('success', 'Guest deleted successfully');
    }

    public function confirm(Request $request, $id)
    {
        $guest = Guest::findOrFail($id);
        $guest->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status updated successfully');
    }

    public function comment(Request $request, $id)
    {
        $guest = Guest::findOrFail($id);
        $guest->update([
            'comment' => $request->comment
        ]);

        return back()->with('success', 'Comment updated successfully')->withFragment('comment');
    }
}
