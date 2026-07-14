<?php

namespace App\Http\Controllers;

use App\Models\Landing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function ensureAdmin()
    {
        if (!auth()->user() || !auth()->user()->isAdmin()) {
            abort(403);
        }
    }

    public function edit()
    {
        $this->ensureAdmin();
        $landing = Landing::first();
        return view('dashboard.landing.edit', compact('landing'));
    }

    public function update(Request $request)
    {
        $this->ensureAdmin();

        $data = $request->validate([
            'hero_title' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string',
            'informasi_title' => 'nullable|string|max:255',
            'informasi_desc' => 'nullable|string',
            'fasilitas_title' => 'nullable|string|max:255',
            'fasilitas_desc' => 'nullable|string',
            'ekskul_title' => 'nullable|string|max:255',
            'ekskul_desc' => 'nullable|string',
            'contact_title' => 'nullable|string|max:255',
            'contact_desc' => 'nullable|string',
            'informasi_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:2048',
            'fasilitas_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:2048',
            'ekskul_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:2048',
        ]);

        $landing = Landing::first() ?? new Landing();
        $landing->hero_title = $data['hero_title'] ?? null;
        $landing->hero_subtitle = $data['hero_subtitle'] ?? null;

        $previousCards = collect($landing->info_cards ?? []);
        $cards = [
            [
                'section' => 'informasi',
                'title' => $data['informasi_title'] ?? 'Informasi Sekolah',
                'desc' => $data['informasi_desc'] ?? '',
                'image' => $previousCards->firstWhere('section', 'informasi')['image'] ?? null,
            ],
            [
                'section' => 'fasilitas',
                'title' => $data['fasilitas_title'] ?? 'Fasilitas',
                'desc' => $data['fasilitas_desc'] ?? '',
                'image' => $previousCards->firstWhere('section', 'fasilitas')['image'] ?? null,
            ],
            [
                'section' => 'ekskul',
                'title' => $data['ekskul_title'] ?? 'Daftar Ekstrakurikuler',
                'desc' => $data['ekskul_desc'] ?? '',
                'image' => $previousCards->firstWhere('section', 'ekskul')['image'] ?? null,
            ],
            [
                'section' => 'contact',
                'title' => $data['contact_title'] ?? 'Kontak & Lokasi',
                'desc' => $data['contact_desc'] ?? '',
                'image' => null,
            ],
        ];

        foreach (['informasi', 'fasilitas', 'ekskul'] as $key) {
            if ($request->hasFile("{$key}_image")) {
                $file = $request->file("{$key}_image");
                $path = $file->store("landing/{$key}", 'public');

                foreach ($cards as &$card) {
                    if ($card['section'] === $key) {
                        if (!empty($card['image']) && Storage::disk('public')->exists($card['image'])) {
                            Storage::disk('public')->delete($card['image']);
                        }
                        $card['image'] = $path;
                        break;
                    }
                }
                unset($card);
            }
        }

        $landing->info_cards = $cards;
        $landing->save();

        return redirect()->route('dashboard.landing.edit')->with('success', 'Landing page berhasil disimpan.');
    }
}
