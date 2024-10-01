@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Daftar Berita</h3>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">List Berita</div>
                            <a href="{{ route('master_berita.store') }}" class="btn btn-primary">Tambah Berita</a>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Tanggal Publish</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($master_berita as $master_berita)
                                        <tr>
                                            <td>{{ $berita->judul }}</td>
                                            <td>{{ $berita->tgl_publish->format('d-m-Y') }}</td>
                                            <td>
                                                <!-- Add action buttons here -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
