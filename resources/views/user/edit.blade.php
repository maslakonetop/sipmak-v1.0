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
        <h2 class="text-center">Edit User {{ $data->name }}</h2>
        <hr class="style15">
        <form action="/user/{{ $data->id }}" method="post">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group row">
                        <label for="id" class="col-sm-4 col-form-label">ID User</label>
                        <div class="col-sm-3">
                            <input type="text" name="id" id="id" class="form-control" value="{{ $data->id }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ $data->name }}"
                                autofocus>
                        </div>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-4 col-form-label">Username <small>untuk
                                login</small></label>
                        <div class="col-sm-8">
                            <input type="text" name="username" id="username"
                                class="form-control @error('username') is-invalid @enderror"
                                value="{{ $data->username }}">
                        </div>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="is_admin" class="col-sm-4 col-form-label">Level User</label>
                        <div class="col-sm-8">
                            <input type="text" name="is_admin" id="is_admin"
                                class="form-control @error('is_admin') is-invalid @enderror"
                                value="{{ $data->is_admin }}">
                        </div>
                        @error('is_admin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" id="email" class="form-control" value="{{ $data->email }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="photo" class="col-sm-4 col-form-label @error('photo') is-invalid @enderror">Unggah
                            Foto Profil</label>
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="photo" name="photo">
                            </div>
                        </div>
                        @error('photo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-outline-info">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>

@endsection