@extends('layout.master')

@section('title')
Tambah Laporan
@endsection

@push('css')
<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous"
/>
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
    integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
/>
@endpush
@section('content')

<h1 class="text-center mb-4 mt-2">Data Mobil</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="/tambahdatalaporan">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama ..">

                            @if($errors->has('nama'))
                            <div class="text-danger">
                                {{ $errors->first('nama')}}
                            </div>
                            @endif

                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select class="form-select" name="jenis_kelamin">
                                <option selected>Jenis Kelamin</option>
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <input name="alamat" class="form-control" placeholder="alamat ..">

                            @if($errors->has('alamat'))
                            <div class="text-danger">
                                {{ $errors->first('alamat')}}
                            </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>No. HP</label>
                            <input name="nohp" class="form-control" placeholder="No HP ..">

                            @if($errors->has('nohp'))
                            <div class="text-danger">
                                {{ $errors->first('nohp')}}
                            </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Tanggal Pinjam</label>
                            <input type="date" name="tanggal_pinjam" class="form-control" placeholder="tanggal pinjam ..">

                            @if($errors->has('tanggal_pinjam'))
                            <div class="text-danger">
                                {{ $errors->first('tanggal_pinjam')}}
                            </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Merek Mobil</label>
                            <input name="merekmobil" class="form-control" placeholder="merek mobil ..">

                            @if($errors->has('merekmobil'))
                            <div class="text-danger">
                                {{ $errors->first('merekmobil')}}
                            </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection