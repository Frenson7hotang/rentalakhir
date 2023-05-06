@extends('layout.master')

@section('title')
Data Rental
@endsection
@section('content')

<div class="main-content">

    <a class="btn btn-primary mb-3" href="/tambahlaporan">+ Tambah Data Rental</a>
    <a href="/exportpdf" class="btn btn-info">Export To PDF</a>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th width="20px">No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No. HP</th>
                <th>Tanggal Pinjam</th>
                <th>Merek Mobil</th>
                <th width="180px">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($laporan as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->jenis_kelamin }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->nohp }}</td>
                <td>{{ $p->tanggal_pinjam }}</td>
                <td>{{ $p->merekmobil }}</td>
                <td>
                    <a href="/edit_laporan/{{ $p->id }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    <a href="/hapus_laporan/{{ $p->id }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </a>

    @endsection