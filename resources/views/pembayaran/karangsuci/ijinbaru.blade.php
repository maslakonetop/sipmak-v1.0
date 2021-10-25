@extends('layout.dashtemp')
@section('admin-konten')
<div class="container-fluid">
    <section class="base">
        <h2 class="text-center">{{ $judul }}</h2>
        <hr class="style8">
        <form action="/pembayaran/karangsuci/bayar" method="GET">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    {{-- <select class="cari form-control" name="cari" id="nama_jenazah"></select> --}}

                    <input type="text" name="cari" class="form-control mt-3" placeholder="Cari nama jenazah"
                        value="{{ old('cari') }}">
                </div>
                <div class="col-md-1">
                    {{-- <input type="submit" class="btn btn-outline-info" value="CARI"> --}}
                    <button type="submit" class="btn btn-outline-info mb-3"><i class="fas fa-search"></i></button>
                </div>
                <div class="col-md-3">
                    {{-- <input type="submit" class="btn btn-outline-info" value="CARI"> --}}
                    <a href="/karangsuci/create" class="btn btn-outline-success mt-3"><i class="fas fa-plus-circle"></i>
                        Data Baru</a>
                </div>
            </div>
        </form>
        <hr class="style8">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered" style="width: 100%">
                <thead>
                    <th scope="col" class="text-center text-light bg-info">ID</th>
                    <th scope="col" class="text-center text-light bg-info">No Buku / Plat</th>
                    <th scope="col" class="text-center text-light bg-info">Nama Pemohon</th>
                    <th scope="col" class="text-center text-light bg-info">Nama Jenazah</th>
                    <th scope="col" class="text-center text-light bg-info">Usia</th>
                    <th scope="col" class="text-center text-light bg-info">Wafat Jenazah</th>
                    <th scope="col" class="text-center text-light bg-info">Status Bayar</th>
                    <th scope="col" class="text-center text-light bg-info">Aksi</th>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                    <tr>
                        <td class="text-center text-dark">
                            {{ $row->id }}
                        </td>
                        <td class="text-center text-dark">
                            {{ $row->kode }}-00{{ $row->nobuku_plat }}
                        </td>
                        <td class="text-center text-dark">
                            {{ $row->nama_pemohon }}
                        </td>
                        <td class="text-center text-dark">
                            {{ $row->nama_jenazah }}
                        </td>
                        <td class="text-center text-dark">
                            {{ $row->usia }}
                        </td>
                        <td class="text-center text-dark">
                            {{ \Carbon\Carbon::parse($row->wafat_jenazah)->locale('id')->translatedFormat('l, d F
                            Y') }}
                        </td>
                        <td class="text-center text-dark">
                            {{ $row->statusbayar }}
                        </td>
                        <td>
                            <a href="/pemutihan/karangsuci/form/{{ $row->id }}" class="btn btn-primary"><i
                                    class="fab fa-leanpub"></i></a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            Halaman : {{ $data->currentPage() }} <br />
            Jumlah Data : {{ $data->total() }} <br />
            Data Per Halaman : {{ $data->perPage() }} <br />
            <br>
            {{ $data->links('pagination::bootstrap-4') }}
        </div>
    </section>
</div>
@endsection