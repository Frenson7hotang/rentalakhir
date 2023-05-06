@extends('layout.master')
@section('title')
Mobil
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
@section('content')
<h1 class="text-center mb-4 mt-2">Daftar Mobil</h1>
<div class="container">
    <a href="/tambahmobil" class="btn btn-success">+Tambah Mobil</a>
    {{-- {{Session::get('halaman_url')}} --}}
    
    <div class="row g-3 align-items-center mt-2 mb-3">
        <div class="col-auto">
            <form action="/mobil" method="GET">
                <input type="search" id="searching" name="search" class="form-control">
            </form>
        </div>
        <div class="col-auto">
            <a href="/exportpdfmobil" class="btn btn-info">Export To PDF</a>
        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Merek Mobil</th>
                    <th scope="col">Foto</th>
                    <th scope="col">ID Tipe Mobil</th>
                    <th scope="col">Warna</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Dibuat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $item)
                <tr>
                    <th scope="row">{{$index + $data->firstItem()}}</th>
                    <td>{{$item->merekmobil}}</td>
                    <td>
                        <img
                            src="{{asset('gambar/'.$item->foto)}}"
                            class="img"
                            alt=""
                            style="width: 40px"
                        />
                    </td>
                    <td>{{$item->type_id}}</td>
                    <td>{{$item->warna}}</td>
                    <td>{{$item->harga}}</td>
                    <td>{{$item->created_at->diffforhumans()}}</td>
                    <td>
                        <a
                            href="/tampilkandata/{{$item->id}}"
                            class="btn btn-primary"
                            >Edit</a
                        >
                        <a href="/hapus_mobil/{{$item->id}}" class="btn btn-danger haps">Hapus</a
                        >
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="nav justify-content-center">
            {{$data->links()}}
        </div>
    </div>
</div>
@endsection
@push('js')
<script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"
        ></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            $(".haps").click(function () {
                let mobilid = $(this).attr('data-id');
                let mobilmerekmobil = $(this).attr("data-merekmobil");
                swal({
                  title: "Yakin?",
                  text: "Anda Akan menghapus "+mobilmerekmobil+" ",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                    window.location = "/hapus/"+mobilid+""
                    swal("Data Berhasil dihapus", {
                      icon: "success",
                    });
                  } else {
                    swal("Ok, Data Tidak Jadi Dihapus");
                  }
                });
            });
        </script>
        <script>
            @if(Session::has('success'))
            toastr.success("{{Session::get('success')}}")
            @endif
        </script>    
@endpush

