<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingpageWhyus;
use Illuminate\Http\Request;

class WhyUsController extends Controller
{
    public function index()
    {
        $whyUsItems = LandingpageWhyus::orderBy('order')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.landing.whyus.index', compact('whyUsItems'));
    }

    public function create()
    {
        return view('admin.landing.whyus.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
            'card_title' => 'required|string|max:255',
            'card_description' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

        LandingpageWhyus::create($data);

        return redirect()->route('admin.landing.whyus.index')
            ->with('success', 'Why Us item berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $whyus = LandingpageWhyus::findOrFail($id);
        return view('admin.landing.whyus.edit', compact('whyus'));
    }

    public function update(Request $request, $id)
    {
        $whyus = LandingpageWhyus::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
            'card_title' => 'required|string|max:255',
            'card_description' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

        $whyus->update($data);

        return redirect()->route('admin.landing.whyus.index')
            ->with('success', 'Why Us item berhasil diupdate.');
    }

    public function destroy($id)
    {
        $whyus = LandingpageWhyus::findOrFail($id);
        $whyus->delete();

        return redirect()->route('admin.landing.whyus.index')
            ->with('success', 'Why Us item berhasil dihapus.');
    }
}
