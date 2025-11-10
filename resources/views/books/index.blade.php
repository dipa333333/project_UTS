@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="mb-4 text-center">📚 Daftar Buku Perpustakaan</h1>

    <!-- FORM SEARCH -->
    <form method="GET" action="{{ route('books.index') }}" class="row mb-3">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Cari judul buku..."
                   value="{{ $search }}">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary">Cari</button>
        </div>
    </form>

    <!-- BUTTON TAMBAH -->
    <div class="mb-3 text-end">
        <a href="{{ route('books.create') }}" class="btn btn-success">+ Tambah Buku</a>
    </div>

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($books as $book)
                    <tr>
                        <td class="text-center">{{ $book->id }}</td>
                        <td>{{ $book->judul }}</td>
                        <td>{{ $book->penulis }}</td>
                        <td>{{ $book->penerbit }}</td>
                        <td class="text-center">{{ $book->tahun_terbit }}</td>
                        <td class="text-center">

                            <a href="{{ route('books.edit', $book->id) }}"
                               class="btn btn-warning btn-sm">Edit</a>

                            <button class="btn btn-danger btn-sm"
                                    onclick="deleteBook({{ $book->id }})">
                                Hapus
                            </button>

                            <form id="delete-form-{{ $book->id }}"
                                  method="POST"
                                  action="{{ route('books.destroy', $book->id) }}"
                                  style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>

                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada data buku</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $books->appends(['search' => $search])->links() }}
            </div>

        </div>
    </div>
</div>

@endsection


@section('scripts')
<script>
    function deleteBook(id) {
        Swal.fire({
            title: "Hapus buku ini?",
            text: "Data yang dihapus tidak dapat dikembalikan.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endsection
