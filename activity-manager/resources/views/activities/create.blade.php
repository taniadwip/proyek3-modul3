@extends('layouts.app')

@section('content')
    <p><a href="{{ route('activities.index') }}">&larr; Kembali ke daftar</a></p>
    <h1>Tambah Kegiatan</h1>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 16px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('activities.store') }}" method="POST">
        @csrf
        <div>
            <label>Judul:</label><br>
            <input type="text" name="title" value="{{ old('title') }}" style="width: 100%;">
        </div>
        <br>
        <div>
            <label>Tanggal Kegiatan:</label><br>
            <input type="date" name="activity_date" value="{{ old('activity_date') }}">
        </div>
        <br>
        <div>
            <label>Kategori:</label><br>
            <input type="text" name="category" value="{{ old('category') }}">
        </div>
        <br>
        <div>
            <label>Status:</label><br>
            <select name="status">
                <option value="Planned" {{ old('status') == 'Planned' ? 'selected' : '' }}>Planned</option>
                <option value="Ongoing" {{ old('status') == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="Done" {{ old('status') == 'Done' ? 'selected' : '' }}>Done</option>
            </select>
        </div>
        <br>
        <div>
            <label>Deskripsi:</label><br>
            <textarea name="description" rows="4" style="width: 100%;">{{ old('description') }}</textarea>
        </div>
        <br>
        <button type="submit">Simpan Kegiatan</button>
    </form>
@endsection