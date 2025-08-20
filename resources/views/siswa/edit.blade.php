@extends('layout.sourcelayout')

@section('title', 'Edit Siswa')

@section('content')
<div class="container py-4">
    {{-- Judul Halaman --}}
    <div class="row mb-4">
        <div class="col-md-12 text-center">
            <h2 class="fw-bold text-warning">Edit Data Siswa</h2>
            <p class="text-muted">Perbarui informasi siswa di bawah ini.</p>
        </div>
    </div>

    {{-- Form Edit --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- Flash Message --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Siswa</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama', $siswa->nama) }}"
                                class="form-control @error('nama') is-invalid @enderror" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" name="kelas" id="kelas" value="{{ old('kelas', $siswa->kelas) }}"
                                class="form-control @error('kelas') is-invalid @enderror" required>
                            @error('kelas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" id="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $siswa->alamat) }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="photo" class="form-label">Foto</label>
                            <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror" accept="image/*">
                            @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            @if($siswa->photo)
                                <div class="mt-2">
                                    <label class="form-label d-block">Foto Saat Ini:</label>
                                    <img src="{{ asset('uploads/siswa/' . $siswa->photo) }}" alt="Foto Siswa" width="100" height="100" style="object-fit: cover; border-radius: 5px;">
                                </div>
                            @endif
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('siswa.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left-circle"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-pencil-square"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
