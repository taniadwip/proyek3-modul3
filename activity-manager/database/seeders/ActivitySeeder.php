<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        Activity::query()->insert([
            [
                'title' => 'Workshop Git Dasar',
                'description' => 'Latihan kolaborasi repository GitHub.',
                'activity_date' => '2026-10-05',
                'category' => 'Workshop',
                'status' => 'Planned',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Seminar Web Quality',
                'description' => 'Pengenalan testing dan maintainability.',
                'activity_date' => '2026-10-12',
                'category' => 'Seminar',
                'status' => 'Planned',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sprint Coding Modul 3',
                'description' => 'Implementasi arsitektur dasar Laravel.',
                'activity_date' => '2026-10-15',
                'category' => 'Praktikum',
                'status' => 'Ongoing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Review Arsitektur Perangkat Lunak',
                'description' => 'Evaluasi code smell dan clean code.',
                'activity_date' => '2026-10-18',
                'category' => 'Evaluasi',
                'status' => 'Ongoing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Instalasi Lingkungan Belajar',
                'description' => 'Persiapan PHP, Composer, dan editor.',
                'activity_date' => '2026-09-20',
                'category' => 'Setup',
                'status' => 'Done',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}