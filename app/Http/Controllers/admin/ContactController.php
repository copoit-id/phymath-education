<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingpageContact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = LandingpageContact::orderBy('created_at', 'desc')->get();
        return view('admin.landing.contact.index', compact('contacts'));
    }

    public function create()
    {
        return view('admin.landing.contact.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:phone,email,address,social',
            'label' => 'required|string|max:255',
            'value' => 'required|string',
            'icon' => 'nullable|string|max:255',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        LandingpageContact::create($data);

        return redirect()->route('admin.landing.contact.index')->with('success', 'Contact berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $contact = LandingpageContact::findOrFail($id);
        return view('admin.landing.contact.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|in:phone,email,address,social',
            'label' => 'required|string|max:255',
            'value' => 'required|string',
            'icon' => 'nullable|string|max:255',
        ]);

        $contact = LandingpageContact::findOrFail($id);
        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        $contact->update($data);

        return redirect()->route('admin.landing.contact.index')->with('success', 'Contact berhasil diupdate.');
    }

    public function destroy($id)
    {
        $contact = LandingpageContact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.landing.contact.index')->with('success', 'Contact berhasil dihapus.');
    }
}
