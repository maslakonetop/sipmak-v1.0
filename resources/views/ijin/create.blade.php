@extends('layout.dashtemp')
@section('admin-konten')
<div class="container">
    <section class="base">
        <h2 class="text-center">Data Baru Ijin Pemakaman</h2>
        <hr class="style14">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group row">
                    <label for="nobuku_plat" class="col-sm-4 col-form-label">No Buku / Plat</label>
                    <div class="col-sm-2">
                        <input type="text" name="nobuku_plat" id="nobuku_plat" class="form-control" autofocus>
                    </div>
                    <label for="bulan" class="col-sm-1 col-form-label">/</label>
                    <div class="col-sm-2">
                        <input type="text" name="nobuku_plat" id="nobuku_plat" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id" class="col-sm-4 col-form-label">ID User</label>
                    <div class="col-sm-3">
                        <input type="text" name="id" id="id" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection