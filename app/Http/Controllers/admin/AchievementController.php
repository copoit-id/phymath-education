<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingpageAchievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = LandingpageAchievement::orderBy('order')->get();
        return view('admin.landing.achievement.index', compact('achievements'));
    }

    public function create()
    {
        return view('admin.landing.achievement.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'school' => 'nullable|string|max:255',
            'achievement' => 'required|string|max:255',
            'before_score' => 'nullable|string|max:255',
            'after_score' => 'nullable|string|max:255',
            'improvement' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('achievements', 'public');
        }

        LandingpageAchievement::create($data);

        return redirect()->route('admin.landing.achievement.index')->with('success', 'Pencapaian berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $achievement = LandingpageAchievement::findOrFail($id);
        return view('admin.landing.achievement.edit', compact('achievement'));
    }

    public function update(Request $request, $id)
    {
        $achievement = LandingpageAchievement::findOrFail($id);

        $request->validate([
            'student_name' => 'required|string|max:255',
            'school' => 'nullable|string|max:255',
            'achievement' => 'required|string|max:255',
            'before_score' => 'nullable|string|max:255',
            'after_score' => 'nullable|string|max:255',
            'improvement' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('photo')) {
            if ($achievement->photo) {
                Storage::disk('public')->delete($achievement->photo);
            }
            $data['photo'] = $request->file('photo')->store('achievements', 'public');
        }

        $achievement->update($data);

        return redirect()->route('admin.landing.achievement.index')->with('success', 'Pencapaian berhasil diupdate.');
    }

    public function destroy($id)
    {
        $achievement = LandingpageAchievement::findOrFail($id);

        if ($achievement->photo) {
            Storage::disk('public')->delete($achievement->photo);
        }

        $achievement->delete();

        return redirect()->route('admin.landing.achievement.index')->with('success', 'Pencapaian berhasil dihapus.');
    }
}
