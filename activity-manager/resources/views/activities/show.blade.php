@extends('layouts.app')

@section('content')
    <p><a href="{{ route('activities.index') }}">&larr; Kembali ke daftar</a></p>

    <article class="card">
        <h1>{{ $activity->title }}</h1>
        <p><strong>Tanggal:</strong> {{ $activity->activity_date->format('d M Y') }}</p>
        <p><strong>Kategori:</strong> {{ $activity->category }}</p>
        <p><strong>Status:</strong> <span class="badge">{{ $activity->status }}</span></p>
        <p><strong>Deskripsi:</strong> {{ $activity->description ?? '-' }}</p>
    </article>
@endsection