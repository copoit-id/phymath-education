<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingpageFaq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = LandingpageFaq::orderBy('order')->get();
        return view('admin.landing.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.landing.faq.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        LandingpageFaq::create($request->all());

        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $faq = LandingpageFaq::findOrFail($id);
        return view('admin.landing.faq.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $faq = LandingpageFaq::findOrFail($id);

        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        $faq->update($request->all());

        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil diupdate.');
    }

    public function destroy($id)
    {
        $faq = LandingpageFaq::findOrFail($id);
        $faq->delete();

        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil dihapus.');
    }
}
