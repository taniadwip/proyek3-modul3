<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;
use App\Models\Category;
use App\Services\ActivityService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActivityController extends Controller
{
   public function index(Request $request)
    {
        $query = Activity::with('category');

        // 1. Search Kode / Judul (Hanya jalan jika kolom pencarian diisi)
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('code', 'like', "%{$search}%")
                  ->orWhere('title', 'like', "%{$search}%");
            });
        }

        // 2. Filter Kategori (Hanya jalan jika BUKAN 'Semua Kategori')
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        // 3. Filter Status (Hanya jalan jika BUKAN 'Semua Status')
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        // 4. Sort Tanggal
        $sortDirection = $request->input('sort') === 'asc' ? 'asc' : 'desc';
        $query->orderBy('activity_date', $sortDirection);

        // 5. Pagination 5 data per halaman
        $activities = $query->paginate(5)->withQueryString();
        $categories = Category::orderBy('name')->get();

        return view('activities.index', compact('activities', 'categories'));
    }

    public function create(): View
{
    $categories = Category::orderBy('name')->get();
    return view('activities.create', compact('categories'));
}

    public function store(StoreActivityRequest $request)
{
    // Pastikan menggunakan $request->validated()
    Activity::create($request->validated());

    return redirect()->route('activities.index')->with('success', 'Kegiatan berhasil dibuat.');
}

    public function show(Activity $activity): View
    {
        return view('activities.show', compact('activity'));
    }

    public function edit(Activity $activity): View
{
    $categories = Category::orderBy('name')->get();
    return view('activities.edit', compact('activity', 'categories'));
}

    public function update(UpdateActivityRequest $request, Activity $activity, ActivityService $service): RedirectResponse
    {
        $service->update($activity, $request->validated());

        return redirect()
            ->route('activities.show', $activity)
            ->with('success', 'Kegiatan berhasil diperbarui!');
    }

    public function destroy(Activity $activity): RedirectResponse
    {
        $activity->delete();

        return redirect()
            ->route('activities.index')
            ->with('success', 'Kegiatan berhasil dihapus!');
    }
}
