<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingpageTestimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonyController extends Controller
{
    public function index()
    {
        $testimonies = LandingpageTestimony::orderBy('order')->get();
        return view('admin.landing.testimony.index', compact('testimonies'));
    }

    public function create()
    {
        return view('admin.landing.testimony.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'school' => 'required|string|max:255',
            'message' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('testimonies', 'public');
        }

        LandingpageTestimony::create($data);

        return redirect()->route('admin.landing.testimony.index')
            ->with('success', 'Testimony berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $testimony = LandingpageTestimony::findOrFail($id);
        return view('admin.landing.testimony.edit', compact('testimony'));
    }

    public function update(Request $request, $id)
    {
        $testimony = LandingpageTestimony::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'school' => 'required|string|max:255',
            'message' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('photo')) {
            if ($testimony->photo) {
                Storage::disk('public')->delete($testimony->photo);
            }
            $data['photo'] = $request->file('photo')->store('testimonies', 'public');
        }

        $testimony->update($data);

        return redirect()->route('admin.landing.testimony.index')
            ->with('success', 'Testimony berhasil diupdate.');
    }

    public function destroy($id)
    {
        $testimony = LandingpageTestimony::findOrFail($id);

        if ($testimony->photo) {
            Storage::disk('public')->delete($testimony->photo);
        }

        $testimony->delete();

        return redirect()->route('admin.landing.testimony.index')
            ->with('success', 'Testimony berhasil dihapus.');
    }
}
