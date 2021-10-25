@extends('layout.dashtemp')
@section('admin-konten')
<div class="container-fluid">
    <section class="base">
        @if (session()->has('berhasil'))

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('berhasil') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <h2 class="text-center">{{ $judul }} No Buku {{ $data-kode }}-{{ $data-nobuku_plat }}</h2>
        <form action="/prosesbayar" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-6">

                </div>
            </div>
        </form>
    </section>
</div>
@endsection