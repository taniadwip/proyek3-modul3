@extends('layouts.app')

@section('content')
    <p><a href="{{ route('activities.show', $activity) }}">&larr; Batal</a></p>
    <h1>Edit Kegiatan</h1>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 16px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('activities.update', $activity) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Judul:</label><br>
            <input type="text" name="title" value="{{ old('title', $activity->title) }}" style="width: 100%;">
        </div>
        <br>
        <div>
            <label>Tanggal Kegiatan:</label><br>
            <input type="date" name="activity_date" value="{{ old('activity_date', $activity->activity_date->format('Y-m-d')) }}">
        </div>
        <br>
        <div>
            <label>Kategori:</label><br>
            <input type="text" name="category" value="{{ old('category', $activity->category) }}">
        </div>
        <br>
        <div>
            <label>Status:</label><br>
            <select name="status">
                <option value="Planned" {{ old('status', $activity->status) == 'Planned' ? 'selected' : '' }}>Planned</option>
                <option value="Ongoing" {{ old('status', $activity->status) == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="Done" {{ old('status', $activity->status) == 'Done' ? 'selected' : '' }}>Done</option>
            </select>
        </div>
        <br>
        <div>
            <label>Deskripsi:</label><br>
            <textarea name="description" rows="4" style="width: 100%;">{{ old('description', $activity->description) }}</textarea>
        </div>
        <br>
        <button type="submit">Perbarui Kegiatan</button>
    </form>
@endsection