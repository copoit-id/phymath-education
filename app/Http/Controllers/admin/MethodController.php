<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingpageMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MethodController extends Controller
{
    public function index()
    {
        $methods = LandingpageMethod::orderBy('order')->get();
        return view('admin.landing.method.index', compact('methods'));
    }

    public function create()
    {
        return view('admin.landing.method.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('methods', 'public');
        }

        LandingpageMethod::create($data);

        return redirect()->route('admin.landing.method.index')->with('success', 'Metode pembelajaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $method = LandingpageMethod::findOrFail($id);
        return view('admin.landing.method.edit', compact('method'));
    }

    public function update(Request $request, $id)
    {
        $method = LandingpageMethod::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($method->image) {
                Storage::disk('public')->delete($method->image);
            }
            $data['image'] = $request->file('image')->store('methods', 'public');
        }

        $method->update($data);

        return redirect()->route('admin.landing.method.index')->with('success', 'Metode pembelajaran berhasil diupdate.');
    }

    public function destroy($id)
    {
        $method = LandingpageMethod::findOrFail($id);

        if ($method->image) {
            Storage::disk('public')->delete($method->image);
        }

        $method->delete();

        return redirect()->route('admin.landing.method.index')->with('success', 'Metode pembelajaran berhasil dihapus.');
    }
}
