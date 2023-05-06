@extends('layout.master')
@section('title')
Tipe Mobil
@endsection
@section('content')

<div class="main-content">

<a class="btn btn-primary mb-3" href="/tambah_type">+ Tambah Tipe Mobil</a>

	<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
                <th scope="col">No</th>
                <th scope="col">Kode Tipe</th>
                <th scope="col">Tipe Mobil</th>
                <th scope="col">Daftar Mobil</th>
                <th scope="col">Aksi</th>
			</tr>
		</thead>
        
        <tbody>
                @foreach($type as $p)
                <tr>
                    <td scope="row">{{$loop -> iteration}}</td>
                    <td>{{ $p->kode_type }}</td>
                    <td>{{ $p->nama_type }}</td>
                    <td>
                        @foreach ($p->mobils as $mobil)
                        {{ $mobil->merekmobil }},
                        @endforeach
                    </td>
                    <td>
                        <a href="/edit_type/{{ $p->id }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
	                    <a href="/hapus_type/{{ $p->id }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
</a>

@endsection
