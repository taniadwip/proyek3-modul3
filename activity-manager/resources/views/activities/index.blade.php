@extends('layouts.app')

@section('content')
    <p><a href="{{ route('activities.create') }}">+ Tambah Kegiatan Baru</a></p>
    <h1>Daftar Kegiatan</h1>

    <!-- FORM FILTER DAN PENCARIAN -->
    <form action="{{ route('activities.index') }}" method="GET" style="display: flex; gap: 8px; margin-bottom: 24px; flex-wrap: wrap; align-items: center;">
        <input type="text" name="search" placeholder="Cari kode atau judul..." value="{{ request('search') }}" style="padding: 6px 10px;">

        <select name="category_id" style="padding: 6px 10px;">
            <option value="">Semua Kategori</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>

        <select name="status" style="padding: 6px 10px;">
            <option value="">Semua Status</option>
            <option value="Planned" {{ request('status') === 'Planned' ? 'selected' : '' }}>Planned</option>
            <option value="Ongoing" {{ request('status') === 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
            <option value="Done" {{ request('status') === 'Done' ? 'selected' : '' }}>Done</option>
            <option value="Draft" {{ request('status') === 'Draft' ? 'selected' : '' }}>Draft</option>
            <option value="Published" {{ request('status') === 'Published' ? 'selected' : '' }}>Published</option>
            <option value="Completed" {{ request('status') === 'Completed' ? 'selected' : '' }}>Completed</option>
        </select>

        <select name="sort" style="padding: 6px 10px;">
            <option value="desc" {{ request('sort', 'desc') === 'desc' ? 'selected' : '' }}>Tanggal Terbaru</option>
            <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>Tanggal Terlama</option>
        </select>

        <button type="submit" style="padding: 6px 14px; cursor: pointer;">Terapkan</button>
        <a href="{{ route('activities.index') }}" style="padding: 6px 10px; text-decoration: none;">Reset</a>
    </form>

    <!-- DAFTAR KARTU KEGIATAN -->
    @forelse ($activities as $activity)
        <article class="card" style="border: 1px solid #d0d7de; border-radius: 8px; padding: 16px; margin-bottom: 14px; background: #fff;">
            <h2 style="margin-top: 0;">
                <a href="{{ route('activities.show', $activity) }}" style="text-decoration: none; color: #0969da;">
                    [{{ $activity->code }}] {{ $activity->title }}
                </a>
            </h2>
            <p style="margin: 6px 0; color: #555;">Tanggal: {{ $activity->activity_date?->format('d M Y') }}</p>
            <p style="margin: 6px 0;">
                Kategori: <strong>{{ $activity->category->name ?? '-' }}</strong> | 
                Status: <span style="background: #eaeef2; padding: 2px 8px; border-radius: 4px; font-size: 0.9em;">{{ $activity->status }}</span>
            </p>
        </article>
    @empty
        <p style="padding: 16px; background: #f6f8fa; border-radius: 6px;">Tidak ada kegiatan yang ditemukan.</p>
    @endforelse

    <!-- LINK PAGINASI -->
    <div style="margin-top: 24px;">
        {{ $activities->links() }}
    </div>
@endsection