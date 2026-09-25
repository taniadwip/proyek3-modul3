@extends('layouts.app')

@section('content')
    <p><a href="{{ route('activities.create') }}">+ Tambah Kegiatan Baru</a></p>
    <h1>Daftar Kegiatan</h1>

    <form action="{{ route('activities.index') }}" method="GET" style="margin-bottom: 20px;">
    <label for="status"><strong>Filter Status:</strong></label>
    <select name="status" id="status" onchange="this.form.submit()">
        <option value="">Semua Status</option>
        <option value="Planned" {{ request('status') === 'Planned' ? 'selected' : '' }}>Planned</option>
        <option value="Ongoing" {{ request('status') === 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
        <option value="Done" {{ request('status') === 'Done' ? 'selected' : '' }}>Done</option>
    </select>

    @if(request('status'))
        <a href="{{ route('activities.index') }}" style="margin-left: 8px;">Reset Filter</a>
    @endif
</form>
    @forelse ($activities as $activity)
        <article class="card">
            <h2>
                <a href="{{ route('activities.show', $activity) }}">
                    {{ $activity->title }}
                </a>
            </h2>
            <p>Tanggal: {{ $activity->activity_date->format('d M Y') }}</p>
            <p>Kategori: {{ $activity->category }} | Status: <span class="badge">{{ $activity->status }}</span></p>
        </article>
    @empty
        <p>Belum ada kegiatan.</p>
    @endforelse
@endsection