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
        <h2 class="text-center">Registrasi Pengguna Baru</h2>
        <hr class="style15">
        <form action="/user" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group row">
                        <label for="id" class="col-sm-4 col-form-label">ID User</label>
                        <div class="col-sm-3">
                            <input type="text" name="id" id="id" class="form-control" value="{{ $data+1 }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                autofocus required>
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
                                value="{{ old('username') }}" required>
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
                            <select name="is_admin" id="is_admin">Level User
                                <option value="">--Pilih Level--</option>
                                <option value="0">User</option>
                                <option value="1">Administrator</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                required>
                        </div>
                        @error('email')
                        <div class="invalid-feedback mb-5">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" required>
                        </div>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="ulangi password" class="col-sm-4 col-form-label">Ulangi Password</label>
                        <div class="col-sm-8">
                            <input type="password" name="ulangipassword" id="ulangipassword"
                                class="form-control @error('ulangipassword') is-invalid @enderror" required>
                        </div>
                        @error('ulangipassword')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
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
                        <button type="submit" class="btn btn-outline-info">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>

@endsection