<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Story;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stories = Story::where('user_id', Auth::id())->get();
        return view('dashboard.story.index', compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.story.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $maxInstance = 3;
        // Count stories in the database before creating a new one
        $storyCount = Story::count();

        // Check if the limit is already reached
        if ($storyCount >= $maxInstance) {
            return redirect()->route('stories.create')->with('error', 'Story limit reached. Please delete an existing story before adding a new one.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'caption' => 'required|string',
            'imagePath' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);
        $imageName = $request->file('imagePath')->getClientOriginalName();
        $imagePath = $request->file('imagePath')->storeAs('stories', $imageName, 'public');
        Story::create([
            'title' => $validated['title'],
            'caption' => $validated['caption'],
            'imagePath' => $imagePath,
            'user_id' => Auth::id()
        ]);
        return redirect()->route('stories.index')->with('success', 'Story created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('dashboard.story.edit', [
            'story' => Story::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'caption' => 'required|string',
            'imagePath' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);

        $story = Story::findOrFail($id);

        if ($request->hasFile('imagePath')) {
            if ($story->imagePath) {
                Storage::disk('public')->delete($story->imagePath);
            }
            $imageName = $request->file('imagePath')->getClientOriginalName();
            $imagePath = $request->file('imagePath')->storeAs('stories', $imageName, 'public');
            $story->imagePath = $imagePath;
        }
        $story->title = $validated['title'];
        $story->caption = $validated['caption'];
        $story->save();

        return redirect()->route('stories.index')->with('success', 'Story updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $story = Story::findOrFail($id);
        Storage::disk('public')->delete($story->imagePath);
        $story->delete();
        return redirect()->route('stories.index')->with('success', 'Story deleted successfully');
    }
}
