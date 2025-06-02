<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Event;
use App\Models\Story;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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
        $guest = Guest::where("user_id", $id)->where("slug", $slug)->first();
        $event = Event::first();
        $stories = Story::all();
        $gallery = Gallery::all();
        $comments = Guest::where('user_id', Auth::id())->whereNotNull('comment')->where('comment', '!=', '')->get();

        if ($event) {
            preg_match('/src="([^"]+)"/', $event->embed_maps, $matches);
            $event->embed_maps_url = $matches[1] ?? '';
            $event->verse_translation = '';

            $surah = $event->surah;
            $ayat = $event->ayat;

            if ($surah && $ayat) {
                $response = Http::get("https://api.alquran.cloud/v1/ayah/{$surah}:{$ayat}/id.indonesian");
                if ($response->successful()) {
                    $data = $response->json();
                    $result = $data['data']['text'] ?? '';
                    $event->verse_translation = $result;
                } else {
                    $event->verse_translation = 'Translation not available';
                }
            }
        }
        $surahMap = [
            'Al-Fatihah' => 1,
            'Al-Baqarah' => 2,
            'Ali \'Imran' => 3,
            'An-Nisa\'' => 4,
            'Al-Ma\'idah' => 5,
            'Al-An\'am' => 6,
            'Al-A\'raf' => 7,
            'Al-Anfal' => 8,
            'At-Taubah' => 9,
            'Yunus' => 10,
            'Hud' => 11,
            'Yusuf' => 12,
            'Ar-Ra\'d' => 13,
            'Ibrahim' => 14,
            'Al-Hijr' => 15,
            'An-Nahl' => 16,
            'Al-Isra\'' => 17,
            'Al-Kahf' => 18,
            'Maryam' => 19,
            'Ta-Ha' => 20,
            'Al-Anbiya\'' => 21,
            'Al-Hajj' => 22,
            'Al-Mu\'minun' => 23,
            'An-Nur' => 24,
            'Al-Furqan' => 25,
            'Ash-Shu\'ara\'' => 26,
            'An-Naml' => 27,
            'Al-Qasas' => 28,
            'Al-\'Ankabut' => 29,
            'Ar-Rum' => 30,
            'Luqman' => 31,
            'As-Sajdah' => 32,
            'Al-Ahzab' => 33,
            'Saba\'' => 34,
            'Fatir' => 35,
            'Yasin' => 36,
            'As-Saffat' => 37,
            'Sad' => 38,
            'Az-Zumar' => 39,
            'Ghafir' => 40,
            'Fussilat' => 41,
            'Ash-Shura' => 42,
            'Az-Zukhruf' => 43,
            'Ad-Dukhan' => 44,
            'Al-Jathiyah' => 45,
            'Al-Ahqaf' => 46,
            'Muhammad' => 47,
            'Al-Fath' => 48,
            'Al-Hujurat' => 49,
            'Qaf' => 50,
            'Adh-Dhariyat' => 51,
            'At-Tur' => 52,
            'An-Najm' => 53,
            'Al-Qamar' => 54,
            'Ar-Rahman' => 55,
            'Al-Waqi\'ah' => 56,
            'Al-Hadid' => 57,
            'Al-Mujadila' => 58,
            'Al-Hashr' => 59,
            'Al-Mumtahanah' => 60,
            'As-Saff' => 61,
            'Al-Jumu\'ah' => 62,
            'Al-Munafiqun' => 63,
            'At-Taghabun' => 64,
            'At-Talaq' => 65,
            'At-Tahrim' => 66,
            'Al-Mulk' => 67,
            'Al-Qalam' => 68,
            'Al-Haqqah' => 69,
            'Al-Ma\'arij' => 70,
            'Nuh' => 71,
            'Al-Jinn' => 72,
            'Al-Muzzammil' => 73,
            'Al-Muddaththir' => 74,
            'Al-Qiyamah' => 75,
            'Al-Insan' => 76,
            'Al-Mursalat' => 77,
            'An-Naba\'' => 78,
            'An-Nazi\'at' => 79,
            '\'Abasa' => 80,
            'At-Takwir' => 81,
            'Al-Infitar' => 82,
            'Al-Mutaffifin' => 83,
            'Al-Inshiqaq' => 84,
            'Al-Buruj' => 85,
            'At-Tariq' => 86,
            'Al-A\'la' => 87,
            'Al-Ghashiyah' => 88,
            'Al-Fajr' => 89,
            'Al-Balad' => 90,
            'Ash-Shams' => 91,
            'Al-Lail' => 92,
            'Ad-Duhaa' => 93,
            'Ash-Sharh' => 94,
            'At-Tin' => 95,
            'Al-\'Alaq' => 96,
            'Al-Qadr' => 97,
            'Al-Bayyinah' => 98,
            'Az-Zalzalah' => 99,
            'Al-\'Adiyat' => 100,
            'Al-Qari\'ah' => 101,
            'At-Takathur' => 102,
            'Al-\'Asr' => 103,
            'Al-Humazah' => 104,
            'Al-Fil' => 105,
            'Quraysh' => 106,
            'Al-Ma\'un' => 107,
            'Al-Kawthar' => 108,
            'Al-Kafirun' => 109,
            'An-Nasr' => 110,
            'Al-Masad' => 111,
            'Al-Ikhlas' => 112,
            'Al-Falaq' => 113,
            'An-Nas' => 114
        ];
        if ($event !== null) {
            $event->surahName = array_search($event?->surah, $surahMap) ?: 'Unknown Surah';
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
