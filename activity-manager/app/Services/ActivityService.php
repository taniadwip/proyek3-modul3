<?php

namespace App\Services;

use App\Models\Activity;
use InvalidArgumentException;

class ActivityService
{
    /**
     * Transisi: Draft -> Published
     * Business rule guard: Judul, deskripsi, tanggal, dan kategori wajib lengkap.
     */
    public function publish(Activity $activity): Activity
    {
        if ($activity->status !== 'Draft') {
            throw new InvalidArgumentException("Hanya kegiatan berstatus Draft yang dapat dipublikasikan.");
        }

        // Business rule guard: validasi kelengkapan data draft
        if (empty($activity->title) || empty($activity->description) || empty($activity->activity_date) || empty($activity->category_id)) {
            throw new InvalidArgumentException("Kegiatan tidak lengkap: deskripsi, tanggal, dan kategori wajib diisi sebelum publikasi.");
        }

        $activity->update(['status' => 'Published']);
        return $activity;
    }

    /**
     * Transisi: Published -> Completed
     */
    public function complete(Activity $activity): Activity
    {
        if ($activity->status !== 'Published') {
            throw new InvalidArgumentException("Hanya kegiatan berstatus Published yang dapat diselesaikan.");
        }

        $activity->update(['status' => 'Completed']);
        return $activity;
    }

    /**
     * Transisi: Perubahan umum dengan pencegahan transisi ilegal
     */
    public function updateStatus(Activity $activity, string $newStatus): Activity
    {
        // Transisi ilegal: Completed tidak boleh kembali ke Draft
        if ($activity->status === 'Completed' && $newStatus === 'Draft') {
            throw new InvalidArgumentException("Transisi ilegal: Kegiatan yang sudah Completed tidak dapat dikembalikan menjadi Draft.");
        }

        if ($newStatus === 'Published') {
            return $this->publish($activity);
        }

        if ($newStatus === 'Completed') {
            return $this->complete($activity);
        }

        $activity->update(['status' => $newStatus]);
        return $activity;
    }
}