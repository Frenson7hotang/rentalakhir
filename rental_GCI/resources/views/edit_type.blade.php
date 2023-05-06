@extends('layout.master')

@section('content')

<div class="card-body">
    
    <form method="post" action="/update_type/{{ $type->id }}">

        {{ csrf_field() }}
        {{ method_field('POST') }}

        <div class="form-group">
            <label>Kode Tipe</label>
            <input type="text" name="kode_type" class="form-control" placeholder="Kode type .." value=" {{ $type->kode_type }}">

            @if($errors->has('kode_type'))
                <div class="text-danger">
                    {{ $errors->first('kode_type')}}
                </div>
            @endif

        </div>

        <div class="form-group">
            <label>Nama Type</label>
            <input type="text" name="nama_type" class="form-control" placeholder="Nama type .." value=" {{ $type->nama_type }}"> 

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