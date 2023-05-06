@extends('layout.master')
@section('content')
<h1 class="text-center mb-4 mt-2">Edit Data Mobil</h1>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-8">
      <a href="/mobil" class="btn btn-primary mb-4">kembali</a>
      <div class="card">
            <div class="card-body">
                <form action="/perbaharuidata/{{$data->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Merek Mobil</label>
                      <input type="text" name="merekmobil" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->merekmobil}}">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail11" class="form-label">Tipe Mobil</label>
                      <select class="form-select" name="type_id" aria-label="Default select example">
                        <option selected>{{$data->type_id}}</option>
                        <option value="">--Pilih Type Mobil--</option>

                            @foreach ($type as $p)
                            <option value="{{ $p->id}}">{{ $p->nama_type }}</option>
                            @endforeach ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail111" class="form-label">Warna</label>
                      <input type="text" name="warna" class="form-control" id="exampleInputEmail111" aria-describedby="emailHelp" value="{{$data->warna}}">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail111" class="form-label">Harga</label>
                      <input type="text" name="harga" class="form-control" id="exampleInputEmail111" aria-describedby="emailHelp" value="{{$data->harga}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
       </div>
    </div>
</div>
@endsection
@push('css')
<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
rel="stylesheet"
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
crossorigin="anonymous"
/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
