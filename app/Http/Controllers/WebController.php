<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class WebController extends Controller
{
    public function index()
    {
        $pemilik = Auth::id();
        $event = Event::where('user_id', $pemilik)->first();

        return view('dashboard.web.index', compact('event'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'groom_name' => 'sometimes|required|string|max:255',
            'groom_daily_name' => 'sometimes|required|string|max:255',
            'groom_fathers_name' => 'sometimes|required|string|max:255',
            'groom_mothers_name' => 'sometimes|required|string|max:255',
            'bride_name' => 'sometimes|required|string|max:255',
            'bride_daily_name' => 'sometimes|required|string|max:255',
            'bride_fathers_name' => 'sometimes|required|string|max:255',
            'bride_mothers_name' => 'sometimes|required|string|max:255',
            'akad_date' => 'sometimes|required|date',
            'resepsi_date' => 'sometimes|required|date',
            'akad_time' => 'sometimes|required',
            'resepsi_time' => 'sometimes|required',
            'place' => 'sometimes|required|string|max:255',
            'maps' => 'sometimes|required|url',
            'embed_maps' => 'sometimes|nullable|string|max:2000',
            'surah' => 'sometimes|required|string|max:255',
            'ayat' => 'sometimes|required|integer|min:1',
            'imgBg' => 'sometimes|required|image|mimes:jpeg,png,jpg|max:10000',
            'MbImgBg' => 'sometimes|required|image|mimes:jpeg,png,jpg|max:10000',
            'CvImgBg' => 'sometimes|required|image|mimes:jpeg,png,jpg|max:10000',
            'bgm' => 'sometimes|required|file|mimes:mp3,wav|max:15000',
            'tujuan' => 'sometimes|required|string|max:5000',
        ]);

        // Proses upload file dengan cara yang benar
        $uploadedFiles = [];

        if ($request->hasFile('imgBg')) {
            $imgBg = $request->file('imgBg');
            $imgBgName = time() . '_desktop_' . $imgBg->getClientOriginalName();
            $uploadedFiles['imgBg'] = $imgBg->storeAs('events', $imgBgName, 'public');
        }

        if ($request->hasFile('MbImgBg')) {
            $mbImgBg = $request->file('MbImgBg');
            $mbImgBgName = time() . '_mobile_' . $mbImgBg->getClientOriginalName();
            $uploadedFiles['MbImgBg'] = $mbImgBg->storeAs('events', $mbImgBgName, 'public');
        }

        if ($request->hasFile('CvImgBg')) {
            $cvImgBg = $request->file('CvImgBg');
            $cvImgBgName = time() . '_cover_' . $cvImgBg->getClientOriginalName();
            $uploadedFiles['CvImgBg'] = $cvImgBg->storeAs('events', $cvImgBgName, 'public');
        }

        if ($request->hasFile('bgm')) {
            $bgm = $request->file('bgm');
            $bgmName = time() . '_bgm_' . $bgm->getClientOriginalName();
            $uploadedFiles['bgm'] = $bgm->storeAs('events', $bgmName, 'public');
        }

        // Normalize nama fields
        $nameFields = [
            'groom_name',
            'groom_daily_name',
            'groom_fathers_name',
            'groom_mothers_name',
            'bride_name',
            'bride_daily_name',
            'bride_fathers_name',
            'bride_mothers_name',
            'surah'
        ];

        foreach ($validatedData as $key => $value) {
            if (in_array($key, $nameFields) && $value) {
                $validatedData[$key] = ucwords(strtolower($value));
            }
        }

        $existingEvent = Event::where('user_id', Auth::id())->first();

        $eventData = $validatedData;

        if (!empty($uploadedFiles)) {
            $eventData = array_merge($eventData, $uploadedFiles);

            if ($existingEvent) {
                foreach ($uploadedFiles as $field => $newPath) {
                    if ($existingEvent->$field && Storage::disk('public')->exists($existingEvent->$field)) {
                        Storage::disk('public')->delete($existingEvent->$field);
                    }
                }
            }
        }

        Event::updateOrCreate(
            ['user_id' => Auth::id()],
            $eventData
        );

        return redirect()->route('web.create')->with('success', 'Event berhasil diperbarui.');
    }

    public function create()
    {
        $response = Http::get('https://api.alquran.cloud/v1/surah');
        $surahs = $response->json('data');
        $event = Event::where('user_id', Auth::id())->first();
        return view('dashboard.web.create', compact('event', 'surahs'));
    }

    public function getAyat($surahNumber)
{
    $response = Http::get("https://api.alquran.cloud/v1/surah/{$surahNumber}");
    $ayahs = $response->json('data.ayahs');

    return response()->json($ayahs);
}
}
