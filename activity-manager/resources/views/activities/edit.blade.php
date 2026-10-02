@extends('layouts.app')

@section('content')
    <p><a href="{{ route('activities.index') }}">&larr; Kembali ke daftar</a></p>
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
            <label><strong>Kode Kegiatan:</strong></label><br>
            <input type="text" name="code" value="{{ old('code', $activity->code) }}" required style="width: 100%;">
            @error('code')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label><strong>Judul:</strong></label><br>
            <input type="text" name="title" value="{{ old('title', $activity->title) }}" required style="width: 100%;">
            @error('title')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label><strong>Tanggal Kegiatan:</strong></label><br>
            <input type="date" name="activity_date" value="{{ old('activity_date', is_string($activity->activity_date) ? $activity->activity_date : $activity->activity_date?->format('Y-m-d')) }}" required>
            @error('activity_date')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div style="margin-bottom: 15px;">
            <label for="category_id"><strong>Kategori:</strong></label><br>
            <select name="category_id" id="category_id" required style="width: 100%; padding: 8px;">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('category_id', $activity->category_id) == $category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label><strong>Status:</strong></label><br>
            <select name="status" required>
                <option value="Planned" {{ old('status', $activity->status) === 'Planned' ? 'selected' : '' }}>Planned</option>
                <option value="Ongoing" {{ old('status', $activity->status) === 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="Done" {{ old('status', $activity->status) === 'Done' ? 'selected' : '' }}>Done</option>
            </select>
            @error('status')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label><strong>Deskripsi:</strong></label><br>
            <textarea name="description" rows="4" style="width: 100%;">{{ old('description', $activity->description) }}</textarea>
            @error('description')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <button type="submit">Perbarui Kegiatan</button>
    </form>
@endsection