@extends('layout.master') 
@section('title')
Tambah Data Mobil
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
@endpush @section('content')
<h1 class="text-center mb-4 mt-2">Tambah Mobil</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form
                        action="/tambahdata"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="mb-3">
                            <label class="form-label"
                                >Merek Mobil</label
                            >
                            <input
                                type="text"
                                name="merekmobil"
                                class="form-control"
                            />
                            @error('merekmobil')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >Tipe Mobil</label
                            >
                            <select
                                class="form-select"
                                name="type_id"
                            >
                            <option value="">--Pilih Type Mobil--</option>

                            @foreach ($type as $p)
                            <option value="{{ $p->id}}">{{ $p->nama_type }}</option>
                            @endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >Warna</label
                            >
                            <input
                                type="text"
                                name="warna"
                                class="form-control"
                            />
                            @error('warna')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >Harga</label
                            >
                            <input
                                type="text"
                                name="harga"
                                class="form-control"
                            />
                            @error('harga')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label
                                
                                class="form-label"
                                >Masukkan Foto</label
                            >
                            <input
                                type="file"
                                name="foto"
                                class="form-control"
                            />
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
