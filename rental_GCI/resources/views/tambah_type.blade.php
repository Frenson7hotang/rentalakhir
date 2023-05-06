@extends('layout.master')
@section('title')
Tambah Tipe Mobil
@endsection
@section('content')

<div class="card-body">
    <form method="post" action="/tambah">

        {{ csrf_field() }}

        <div class="form-group">
            <label>Kode Tipe</label>
            <input type="text" name="kode_type" class="form-control" placeholder="Kode Tipe Mobil ..">

            @if($errors->has('kode_type'))
                <div class="text-danger">
                    {{ $errors->first('kode_type')}}
                </div>
            @endif

        </div>

        <div class="form-group">
            <label>Nama Tipe</label>
            <input name="nama_type" class="form-control" placeholder="Nama Tipe Mobil ..">

                @if($errors->has('nama_type'))
                <div class="text-danger">
                    {{ $errors->first('nama_type')}}
                </div>
            @endif

        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Simpan">
        </div>
        

    </form>

</div>

@endsection