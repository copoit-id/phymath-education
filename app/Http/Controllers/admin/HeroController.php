<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingpageHero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function index()
    {
        $hero = LandingpageHero::first();
        return view('admin.landing.hero.index', compact('hero'));
    }

    public function create()
    {
        // Check if hero already exists
        $hero = LandingpageHero::first();
        if ($hero) {
            return redirect()->route('admin.landing.hero.edit', $hero->id)
                ->with('info', 'Hero section sudah ada. Silakan edit yang sudah ada.');
        }
        return view('admin.landing.hero.create');
    }

    public function store(Request $request)
    {
        // Check if hero already exists
        $existing = LandingpageHero::first();
        if ($existing) {
            return redirect()->route('admin.landing.hero.index')
                ->with('error', 'Hero section sudah ada. Hanya boleh ada satu hero section.');
        }
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'highlight_text' => 'nullable|string|max:255',
            'primary_button_text' => 'required|string|max:255',
            'primary_button_url' => 'required|string|max:255',
            'secondary_button_text' => 'required|string|max:255',
            'secondary_button_url' => 'required|string|max:255',
            'stat_1_number' => 'required|string|max:255',
            'stat_1_label' => 'required|string|max:255',
            'stat_2_number' => 'required|string|max:255',
            'stat_2_label' => 'required|string|max:255',
            'stat_3_number' => 'required|string|max:255',
            'stat_3_label' => 'required|string|max:255',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('background_image')) {
            $data['background_image'] = $request->file('background_image')->store('hero', 'public');
        }

        LandingpageHero::create($data);

        return redirect()->route('admin.hero.index')->with('success', 'Hero section berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $hero = LandingpageHero::findOrFail($id);
        return view('admin.landing.hero.edit', compact('hero'));
    }

    public function update(Request $request, $id)
    {
        $hero = LandingpageHero::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'highlight_text' => 'nullable|string|max:255',
            'primary_button_text' => 'required|string|max:255',
            'primary_button_url' => 'required|string|max:255',
            'secondary_button_text' => 'required|string|max:255',
            'secondary_button_url' => 'required|string|max:255',
            'stat_1_number' => 'required|string|max:255',
            'stat_1_label' => 'required|string|max:255',
            'stat_2_number' => 'required|string|max:255',
            'stat_2_label' => 'required|string|max:255',
            'stat_3_number' => 'required|string|max:255',
            'stat_3_label' => 'required|string|max:255',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('background_image')) {
            if ($hero->background_image) {
                Storage::disk('public')->delete($hero->background_image);
            }
            $data['background_image'] = $request->file('background_image')->store('hero', 'public');
        }

        $hero->update($data);

        return redirect()->route('admin.hero.index')->with('success', 'Hero section berhasil diupdate.');
    }

    public function destroy($id)
    {
        $hero = LandingpageHero::findOrFail($id);

        if ($hero->background_image) {
            Storage::disk('public')->delete($hero->background_image);
        }

        $hero->delete();

        return redirect()->route('admin.hero.index')->with('success', 'Hero section berhasil dihapus.');
    }
}
