@extends('layout.dashtemp')
@section('admin-konten')
<div class="container-fluid">
    <section class="base">
        <h2 class="text-center">Detail User {{ $user->name }}</h2>
        <hr class="style15">
        <form action="/register" method="post">
            @csrf
            <div class="row">
                <div class="col-6">
                    @if ($user->photo)
                    <img class="img-profile rounded-circle" src="{{ asset('storage/' .$user->photo) }}" width="400">
                    @else
                    <img class="img-profile rounded-circle" src="/images/undraw_profile_2.svg" width="400">
                    @endif
                </div>
                <div class="col-6">
                    <div class="form-group row">
                        <label for="id" class="col-sm-4 col-form-label">ID User</label>
                        <div class="col-sm-3">
                            <input type="text" name="id" id="id" class="form-control" value="{{ $user->id }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}"
                                readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-4 col-form-label">Username></label>
                        <div class="col-sm-8">
                            <input type="text" name="username" id="username" class="form-control"
                                value="{{ $user->username }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="is_admin" class="col-sm-4 col-form-label">Level User</label>
                        <div class="col-sm-8">
                            <input type="text" name="is_admin" id="is_admin" class="form-control"
                                value="{{ $user->is_admin }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}"
                                readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <a href="/user" class="btn btn-info">Kembali</a>
                        <a href="/user/edit/{{ $user->id }}" class="btn btn-warning ms-auto">Edit</a>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>

@endsection