<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingpageRating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        $rating = LandingpageRating::first();
        return view('admin.landing.rating.index', compact('rating'));
    }

    public function create()
    {
        return view('admin.landing.rating.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'overall_rating' => 'required|numeric|min:0|max:5',
            'total_reviews' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        LandingpageRating::create($data);

        return redirect()->route('admin.landing.rating.index')->with('success', 'Rating berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $rating = LandingpageRating::findOrFail($id);
        return view('admin.landing.rating.edit', compact('rating'));
    }

    public function update(Request $request, $id)
    {
        $rating = LandingpageRating::findOrFail($id);

        $request->validate([
            'overall_rating' => 'required|numeric|min:0|max:5',
            'total_reviews' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        $rating->update($data);

        return redirect()->route('admin.landing.rating.index')->with('success', 'Rating berhasil diupdate.');
    }

    public function destroy($id)
    {
        $rating = LandingpageRating::findOrFail($id);
        $rating->delete();

        return redirect()->route('admin.landing.rating.index')->with('success', 'Rating berhasil dihapus.');
    }
}
