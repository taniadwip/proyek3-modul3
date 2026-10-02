<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        // Ambil kategori dari database
        $akademik = Category::where('slug', 'akademik')->first();
        $organisasi = Category::where('slug', 'organisasi')->first();
        $workshop = Category::where('slug', 'workshop')->first();

        Activity::create([
            'category_id' => $workshop ? $workshop->id : 1,
            'title' => 'Workshop Git Dasar',
            'activity_date' => '2026-10-05',
            'status' => 'Planned',
            'description' => 'Workshop pengenalan version control.',
        ]);

        Activity::create([
            'category_id' => $akademik ? $akademik->id : 1,
            'title' => 'Seminar Web Quality',
            'activity_date' => '2026-10-12',
            'status' => 'Planned',
            'description' => 'Seminar seputar quality assurance.',
        ]);

        Activity::create([
            'category_id' => $akademik ? $akademik->id : 1,
            'title' => 'Sprint Coding Modul 3',
            'activity_date' => '2026-10-15',
            'status' => 'Ongoing',
            'description' => 'Praktikum Laravel dan SQLite.',
        ]);

        Activity::create([
            'category_id' => $akademik ? $akademik->id : 1,
            'title' => 'Review Arsitektur Perangkat Lunak',
            'activity_date' => '2026-10-18',
            'status' => 'Ongoing',
            'description' => 'Evaluasi clean code dan service layer.',
        ]);

        Activity::create([
            'category_id' => $organisasi ? $organisasi->id : 1,
            'title' => 'Instalasi Lingkungan Belajar',
            'activity_date' => '2026-09-20',
            'status' => 'Done',
            'description' => 'Setup PHP, Composer, dan editor.',
        ]);
    }
}