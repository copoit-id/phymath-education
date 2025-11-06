<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingpageSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = LandingpageSubject::orderBy('order')->get();
        return view('admin.landing.subject.index', compact('subjects'));
    }

    public function create()
    {
        return view('admin.landing.subject.create');
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
            $data['image'] = $request->file('image')->store('subjects', 'public');
        }

        LandingpageSubject::create($data);

        return redirect()->route('admin.landing.subject.index')->with('success', 'Subject berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $subject = LandingpageSubject::findOrFail($id);
        return view('admin.landing.subject.edit', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $subject = LandingpageSubject::findOrFail($id);

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
            if ($subject->image) {
                Storage::disk('public')->delete($subject->image);
            }
            $data['image'] = $request->file('image')->store('subjects', 'public');
        }

        $subject->update($data);

        return redirect()->route('admin.landing.subject.index')->with('success', 'Subject berhasil diupdate.');
    }

    public function destroy($id)
    {
        $subject = LandingpageSubject::findOrFail($id);

        if ($subject->image) {
            Storage::disk('public')->delete($subject->image);
        }

        $subject->delete();

        return redirect()->route('admin.landing.subject.index')->with('success', 'Subject berhasil dihapus.');
    }
}
