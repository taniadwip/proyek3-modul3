<?php

namespace App\Services;

use App\Models\Activity;
use Illuminate\Validation\ValidationException;

class ActivityService
{
    /**
     * Update data kegiatan sekaligus memeriksa aturan transisi status.
     */
    public function update(Activity $activity, array $data): Activity
    {
        $newStatus = $data['status'] ?? $activity->status;

        if (! $this->canTransition($activity->status, $newStatus)) {
            throw ValidationException::withMessages([
                'status' => "Perubahan status dari {$activity->status} ke {$newStatus} tidak diperbolehkan.",
            ]);
        }

        $activity->update($data);

        return $activity;
    }

    /**
     * Memvalidasi apakah perpindahan status diperbolehkan.
     */
    public function canTransition(string $current, string $next): bool
    {
        if ($current === $next) {
            return true;
        }

        return match ($current) {
            'Planned' => in_array($next, ['Ongoing', 'Done']),
            'Ongoing' => $next === 'Done',
            'Done' => false,
            default => false,
        };
    }
}
