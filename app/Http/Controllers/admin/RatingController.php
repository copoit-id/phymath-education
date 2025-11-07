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
        if (LandingpageRating::exists()) {
            $rating = LandingpageRating::first();

            return redirect()
                ->route('admin.landing.rating.edit', $rating->id)
                ->with('info', 'Rating sudah ada. Anda dapat mengedit data yang tersedia.');
        }

        return view('admin.landing.rating.create');
    }

    public function store(Request $request)
    {
        if (LandingpageRating::exists()) {
            return redirect()
                ->route('admin.landing.rating.index')
                ->with('info', 'Rating sudah tersedia. Silakan edit data yang ada.');
        }

        $data = $request->validate([
            'category' => 'required|string|max:255',
            'rating_value' => 'required|numeric|min:0|max:5',
            'total_reviews' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

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

        $data = $request->validate([
            'category' => 'required|string|max:255',
            'rating_value' => 'required|numeric|min:0|max:5',
            'total_reviews' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

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
