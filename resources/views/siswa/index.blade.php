@extends('layout.sourcelayout')

@section('title', 'Data Siswa')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Daftar Siswa</h1>

    <a href="{{ route('siswa.create') }}" class="btn btn-primary mb-3">+ Tambah Siswa</a>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tabel Data Siswa</h3>
        </div>

        <div class="card-body">
            @if(session('success'))
    <div id="simple-alert" class="alert alert-success">
        {{ session('success') }}
    </div>

    <script>
        // Tunggu 3 detik lalu hilangkan notifikasi
        setTimeout(function () {
            const alert = document.getElementById('simple-alert');
            if (alert) {
                // Tambahkan efek fade-out jika kamu punya class CSS, atau langsung hapus
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';

                // Setelah animasi selesai, hapus elemen dari DOM (opsional)
                setTimeout(() => alert.remove(), 500); // tunggu transisi selesai
            }
        }, 3000); // 3 detik
    </script>
@endif

            <table class="table table-bordered table-striped" id="dataTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Alamat</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($siswas as $index => $siswa)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->kelas }}</td>
                <td>{{ $siswa->alamat ?? '-' }}</td>
                <td>
                    @if($siswa->photo)
                        <img src="{{ asset('uploads/siswa/' . $siswa->photo) }}" 
     alt="Foto" 
     width="80" 
     height="80" 
     style="object-fit: cover; border-radius: 50%;">

                    @else
                        <span class="text-muted">Tidak ada foto</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus siswa ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Tidak ada data siswa</td>
            </tr>
        @endforelse
    </tbody>
</table>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
@endpush
