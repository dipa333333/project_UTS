@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="mb-4">Edit Buku</h2>

    <div class="card shadow">
        <div class="card-body">

            <form action="{{ route('books.update', $book->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Judul Buku</label>
                    <input type="text" name="judul" class="form-control"
                           value="{{ $book->judul }}" required>
                </div>

                <div class="mb-3">
                    <label>Penulis</label>
                    <input type="text" name="penulis" class="form-control"
                           value="{{ $book->penulis }}" required>
                </div>

                <div class="mb-3">
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" class="form-control"
                           value="{{ $book->penerbit }}" required>
                </div>

                <div class="mb-3">
                    <label>Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" class="form-control"
                           value="{{ $book->tahun_terbit }}" required>
                </div>

                <button class="btn btn-warning">Update</button>
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>

@endsection
