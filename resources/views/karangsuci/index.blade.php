@extends('layout.dashtemp')
@section('admin-konten')
<div class="container-fluid">
    <section class="base">
        <h2 class="text-center">List Ijin Makam Karang Suci</h2>
        <hr class="style14">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <a href="/karangsuci/create" class="btn btn-outline-info mb-3">Ijin Baru</a>
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
                                    {{ $row->kode }}/00{{ $row->nobuku_plat }}
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
                                    <a href="/karangsuci/{{ $row->id }}" class="btn btn-success"><i
                                            class="far fa-eye"></i></a>
                                    <a href="/karangsuci/{{ $row->id }}/edit" class="btn btn-warning"><i
                                            class="fas fa-pen-square"></i></a>
                                    <form action="/karangsuci/{{ $row->id }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger mb-4"
                                            onclick="return confirm('Yakin akan menghapus data?')"><i
                                                class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection