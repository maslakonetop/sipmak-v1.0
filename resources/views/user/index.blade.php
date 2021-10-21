@extends('layout.dashtemp')
@section('admin-konten')
<div class="container">
    <section class="base">
        @if (session()->has('berhasil'))

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('berhasil') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <h2 class="text-center">List User Sipmak</h2>
        <hr class="style8">
        <a href="/user/create" class="btn btn-outline-primary mb-3">Register</a>
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-striped table-bordered" style="width: 100%">
                        <thead>
                            <th scope="col" class="text-center text-light bg-info">ID</th>
                            <th scope="col" class="text-center text-light bg-info">Nama</th>
                            <th scope="col" class="text-center text-light bg-info">Nama Pengguna</th>
                            <th scope="col" class="text-center text-light bg-info">Email</th>
                            <th scope="col" class="text-center text-light bg-info">Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                            <tr>
                                <td class="text-center text-dark">
                                    {{ $row->id }}
                                </td>
                                <td class="text-center text-dark">
                                    {{ $row->name }}
                                </td>
                                <td class="text-center text-dark">
                                    {{ $row->username }}
                                </td>
                                <td class="text-center text-dark">
                                    {{ $row->email }}
                                </td>
                                <td>
                                    <a href="/user/{{ $row->id }}" class="btn btn-success"><i
                                            class="far fa-eye"></i></a>
                                    <a href="/user/{{ $row->id }}/edit" class="btn btn-warning"><i
                                            class="fas fa-pen-square"></i></a>
                                    <form action="/user/{{ $row->id }}" method="post" class="d-inline">
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