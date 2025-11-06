<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingpageWhyus;
use Illuminate\Http\Request;

class WhyUsController extends Controller
{
    public function index()
    {
        $whyUsItems = LandingpageWhyus::orderBy('created_at', 'desc')->get();
        return view('admin.landing.whyus.index', compact('whyUsItems'));
    }

    public function create()
    {
        return view('admin.landing.whyus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
            'card_title' => 'required|string|max:255',
            'card_description' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        LandingpageWhyus::create($request->all());

        return redirect()->route('admin.whyus.index')->with('success', 'Why Us item berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $whyus = LandingpageWhyus::findOrFail($id);
        return view('admin.landing.whyus.edit', compact('whyus'));
    }

    public function update(Request $request, $id)
    {
        $whyus = LandingpageWhyus::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
            'card_title' => 'required|string|max:255',
            'card_description' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        $whyus->update($request->all());

        return redirect()->route('admin.whyus.index')->with('success', 'Why Us item berhasil diupdate.');
    }

    public function destroy($id)
    {
        $whyus = LandingpageWhyus::findOrFail($id);
        $whyus->delete();

        return redirect()->route('admin.whyus.index')->with('success', 'Why Us item berhasil dihapus.');
    }
}
