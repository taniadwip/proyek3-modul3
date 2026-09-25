@extends('layouts.app')

@section('content')
    <p>
    <a href="{{ route('activities.edit', $activity) }}">Edit Kegiatan</a>
</p>
<form action="{{ route('activities.destroy', $activity) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?');">
    @csrf
    @method('DELETE')
    <button type="submit" style="color: red;">Hapus Kegiatan</button>
</form>

    <article class="card">
        <h1>{{ $activity->title }}</h1>
        <p><strong>Tanggal:</strong> {{ $activity->activity_date->format('d M Y') }}</p>
        <p><strong>Kategori:</strong> {{ $activity->category }}</p>
        <p><strong>Status:</strong> <span class="badge">{{ $activity->status }}</span></p>
        <p><strong>Deskripsi:</strong> {{ $activity->description ?? '-' }}</p>
    </article>
@endsection