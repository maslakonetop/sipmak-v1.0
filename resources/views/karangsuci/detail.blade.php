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
        <h2 class="text-center">Detail Ijin a/n {{ $data->nama_pemohon }}</h2>
        <h4 class="text-center">Untuk Ijin Jenazah a/n {{ $data->nama_jenazah }}</h4>
        <hr class="style14">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="id" class="col-sm-4 col-form-label">Nobuku_plat</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" value="KR" readonly>
                        <input type="hidden" name="kode" id="kode" class="form-control" value="KR">
                    </div>
                    <label for="separator" class="col-sm-1 col-form-label">/</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{ $data->nobuku_plat }}" readonly>
                        <input type="hidden" name="nobuku_plat" id="nobuku_plat" class="form-control"
                            value="{{ $data->nobuku_plat }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_pemohon" class="col-sm-4 col-form-label">Nama Pemohon</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama_pemohon" id="nama_pemohon" class="form-control"
                            value="{{ $data->nama_pemohon }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_jenazah" class="col-sm-4 col-form-label">Nama Jenazah</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama_jenazah" id="nama_jenazah" class="form-control"
                            value="{{ $data->nama_jenazah }} " readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lahir_jenazah" class="col-sm-4 col-form-label">Tgl Lahir Jenazah</label>
                    <div class="col-sm-8">
                        <input type="text" name="lahir_jenazah" id="lahir_jenazah" class="form-control"
                            value="{{ \Carbon\Carbon::parse($data->lahir_jenazah)->locale('id')->translatedFormat('l, d F Y') }}"
                            readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="wafat_jenazah" class="col-sm-4 col-form-label">Wafat Jenazah</label>
                    <div class="col-sm-8">
                        <input type="text" name="wafat_jenazah" id="wafat_jenazah" class="form-control"
                            value="{{ \Carbon\Carbon::parse($data->wafat_jenazah)->locale('id')->translatedFormat('l, d F Y') }}"
                            readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="usia" class="col-sm-4 col-form-label">Usia</label>
                    <div class="col-sm-4">
                        <input type="number" name="usia" id="usia" class="form-control" value="{{ $data->usia }}"
                            readonly>
                    </div>
                    <label for="usia" class="col-sm-4 col-form-label">Tahun</label>
                </div>
                <a href="/karangsuci" class="btn btn-info" style="margin-top: 75px">Kembali</a>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="lokasimakam1" class="col-sm-4 col-form-label">Lokasi Makam</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $data->lokasimakam1 }}" readonly>
                        <input type="hidden" name="lokasimakam1" id="lokasimakam1" value="{{ $data->lokasimakam1 }}">
                        <input type="hidden" name="lokasimakam2" id="lokasimakam2" value="{{ $data->lokasimakam2 }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ijinmulai" class="col-sm-4 col-form-label">Ijin Berlaku</label>
                    <div class="col-sm-8">
                        <input type="text" name="ijinmulai" id="ijinmulai" class="form-control"
                            value="{{ \Carbon\Carbon::parse($data->ijinmulai)->locale('id')->translatedFormat('l, d F Y') }}"
                            readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="expired" class="col-sm-4 col-form-label">IIjin Expired</label>
                    <div class="col-sm-8">
                        <input type="text" name="expired" id="expired" class="form-control"
                            value="{{ \Carbon\Carbon::parse($data->expired)->locale('id')->translatedFormat('l, d F Y') }}"
                            readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="keterangan" class="col-sm-4 col-form-label">Keterangan Jenazah</label>
                    <div class="col-sm-8">
                        <input type="text" name="keterangan" id="ketarangan" class="form-control"
                            value="{{ $data->keterangan }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bayar" class="col-sm-4 col-form-label">Biaya</label>
                    <label for="bayar" class="col-sm-2 col-form-label">Rp.</label>
                    <div class="col-sm-6">
                        <input type="text" name="bayar" id="bayar" class="form-control" value="{{ $data->bayar}}"
                            readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="statusijin" class="col-sm-4 col-form-label">Status Ijin</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{ $data->statusijin }}" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="statusbayar" class="col-sm-4 col-form-label">Status Bayar</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{ $data->statusbayar }}" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <a href="/karangsuci/{{ $data->id }}/edit" class="btn btn-warning" style="margin-top: 21px"><i
                            class="far fa-edit"></i> Edit</a>
                </div>
            </div>
        </div>
</div>
</div>
</section>
</div>
@endsection