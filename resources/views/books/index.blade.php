<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">

        <h1 class="mb-4 text-center">📚 Daftar Buku Perpustakaan</h1>

        <!-- FORM SEARCH -->
        <form method="GET" action="{{ route('books.index') }}" class="row mb-3">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Cari judul Buku, penulis, atau penerbit"
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

        <!-- TABLE -->
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
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <button class="btn btn-danger btn-sm"
                                        onclick="deleteBook({{ $book->id }})">
                                    Hapus
                                </button>

                                <form id="delete-form-{{ $book->id }}"
                                      action="{{ route('books.destroy', $book->id) }}"
                                      method="POST" style="display: none;">
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

                <!-- PAGINATION -->
                <div class="mt-3">
                    {{ $books->appends(['search' => $search])->links() }}
                </div>

            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- TOAST SUCCESS -->
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                position: 'center'
            });
        @endif
    </script>

    <!-- DELETE CONFIRMATION -->
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

</body>
</html>
