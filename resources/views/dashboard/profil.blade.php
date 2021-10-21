@extends('layout.dashtemp')
@section('admin-konten')
<div class="container">
    <section class="base">
        <h2 class="text-center">Profil Saya</h2>
        <h5 class="text-center">{{ auth()->user()->name }}</h5>
        <hr class="style15">
        <div class="row">
            <div class="row">
                <div class="col-6">
                    <img class="img-profile rounded-circle" src="{{ asset('storage/' .auth()->user()->photo) }}">
                </div>
                <div class="col-6">
                    <div class="form-group row">
                        <label for="id" class="col-sm-4 col-form-label">ID User</label>
                        <div class="col-sm-3">
                            <input type="text" name="id" id="id" class="form-control" value="{{ auth()->user()->id }}"
                                readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ auth()->user()->name }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-4 col-form-label">Username></label>
                        <div class="col-sm-8">
                            <input type="text" name="username" id="username" class="form-control"
                                value="{{ auth()->user()->username }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ auth()->user()->email }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <a href="/" class="btn btn-info">Kembali</a>
                        <a href="/user/edit/{{ auth()->user()->id }}" class="btn btn-warning ms-auto">Edit</a>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection