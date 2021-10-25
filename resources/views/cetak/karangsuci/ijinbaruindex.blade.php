@extends('layout.dashtemp')
@section('admin-konten')
<div class="container-fluid">
    <section class="base">
        <h2 class="text-center">{{ $judul }}</h2>
        <hr class="style14">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <form action="/cetak/karangsuci/ijinbaru/cari" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                {{-- <select class="cari form-control" name="cari" id="nama_jenazah"></select> --}}

                                <input type="text" name="cari" class="form-control mt-3"
                                    placeholder="Cari Nama Jenazah atau Nama Pemohon" value="{{ old('cari') }}">
                            </div>
                            <div class="col-md-1">
                                {{-- <input type="submit" class="btn btn-outline-info" value="CARI"> --}}
                                <button type="submit" class="btn btn-outline-info mb-3"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>

                    <table class="table table-sm table-hover table-striped table-bordered" style="width: 100%">
                        <thead>
                            <th scope="col" class="text-center text-light bg-info">ID</th>
                            <th scope="col" class="text-center text-light bg-info">No Buku / Plat</th>
                            <th scope="col" class="text-center text-light bg-info">Nama Pemohon</th>
                            <th scope="col" class="text-center text-light bg-info">Nama Jenazah</th>
                            <th scope="col" class="text-center text-light bg-info">Usia</th>
                            <th scope="col" class="text-center text-light bg-info">Status Ijin</th>
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
                                    {{ $row->statusijin }}
                                </td>
                                <td class="text-center text-dark">
                                    {{ $row->statusbayar }}
                                </td>
                                <td>
                                    <a href="/cetak/karangsuci/ijinbaru/print/{{ $row->id }}" class="btn btn-success"><i
                                            class="far fa-file-word"></i></a>
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
            </div>
        </div>
    </section>
</div>
@endsection