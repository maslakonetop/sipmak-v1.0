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
        <h2 class="text-center">Ijin Baru Makam Karang Suci</h2>
        <hr class="style14">
        <form action="/kerkoff" method="post">
            @csrf
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
                            <input type="text" class="form-control" value="{{ $data+1 }}" readonly>
                            <input type="hidden" name="nobuku_plat" id="nobuku_plat" class="form-control"
                                value="{{ $data+1 }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_pemohon" class="col-sm-4 col-form-label">Nama Pemohon</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_pemohon" id="nama_pemohon"
                                class="form-control @error('nama_pemohon') is-invalid @enderror"
                                value="{{ old('nama_pemohon') }}" autofocus required>
                        </div>
                        @error('nama_pemohon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="nama_jenazah" class="col-sm-4 col-form-label">Nama Jenazah</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_jenazah" id="nama_jenazah"
                                class="form-control @error('nama_jenazah') is-invalid @enderror"
                                value="{{ old('nama_jenazah') }}" required>
                        </div>
                        @error('nama_jenazah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="lahir_jenazah" class="col-sm-4 col-form-label">Tgl Lahir Jenazah</label>
                        <div class="col-sm-8">
                            <input type="date" name="lahir_jenazah" id="lahir_jenazah"
                                class="form-control @error('lahir_jenazah') is-invalid @enderror"
                                value="{{ old('lahir_jenazah') }}" required>
                        </div>
                        @error('lahir_jenazah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="wafat_jenazah" class="col-sm-4 col-form-label">Wafat Jenazah</label>
                        <div class="col-sm-8">
                            <input type="date" name="wafat_jenazah" id="wafat_jenazah"
                                class="form-control @error('wafat_jenazah') is-invalid @enderror"
                                value="{{ old('wafat_jenazah') }}" required>
                        </div>
                        @error('wafat_jenazah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="usia" class="col-sm-4 col-form-label">Usia</label>
                        <div class="col-sm-4">
                            <input type="number" name="usia" id="usia"
                                class="form-control @error('usia') is-invalid @enderror" value="{{ old('usia') }}"
                                required>
                        </div>
                        <label for="usia" class="col-sm-4 col-form-label">Tahun</label>
                        @error('usia')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <a href="/karangsuci" class="btn btn-info" style="margin-top: 75px">Kembali</a>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="lokasimakam1" class="col-sm-4 col-form-label">Lokasi Makam</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="TPU KARANG SUCI KELURAHAN DONAN" readonly>
                            <input type="hidden" name="lokasimakam1" id="lokasimakam1"
                                value="TPU KARANG SUCI KELURAHAN DONAN">
                            <input type="hidden" name="lokasimakam2" id="lokasimakam2" value="KECAMATAN CILACAP TENGAH">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ijinmulai" class="col-sm-4 col-form-label">Ijin Berlaku</label>
                        <div class="col-sm-8">
                            <input type="date" name="ijinmulai" id="ijinmulai"
                                class="form-control @error('ijinmulai') is-invalid @enderror"
                                value="{{ old('ijinmulai') }}" required>
                        </div>
                        @error('ijinmulai')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="expired" class="col-sm-4 col-form-label">IIjin Expired</label>
                        <div class="col-sm-8">
                            <input type="date" name="expired" id="expired"
                                class="form-control @error('expired') is-invalid @enderror" value="{{ old('expired') }}"
                                required>
                        </div>
                        @error('expired')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-sm-4 col-form-label">Keterangan Jenazah</label>
                        <div class="col-sm-8">
                            <select name="keterangan" id="keterangan">
                                <option value="disableselected">--Pilih Keterangan Jenazah--</option>
                                <option value="ANAK">ANAK</option>
                                <option value="DEWASA">DEWASA</option>
                            </select>
                        </div>
                        @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="bayar" class="col-sm-4 col-form-label">Biaya</label>
                        <label for="bayar" class="col-sm-2 col-form-label">Rp.</label>
                        <div class="col-sm-6">
                            <input type="text" name="bayar" id="bayar"
                                class="form-control @error('bayar') is-invalid @enderror" value="{{ old('bayar') }}"
                                required>
                        </div>
                        @error('bayar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="statusijin" class="col-sm-4 col-form-label">Status Ijin</label>
                        <div class="col-sm-8">
                            <input type="text" value="IJIN BARU" class="form-control" readonly>
                            <input type="hidden" name="statusijin" id="statusijin" value="IJIN BARU">
                        </div>
                        @error('statusijin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="statusbayar" class="col-sm-4 col-form-label">Status Ijin</label>
                        <div class="col-sm-8">
                            <input type="text" value="BELUM BAYAR" class="form-control" readonly>
                            <input type="hidden" name="statusbayar" id="statusbayar" value="BELUM BAYAR">
                        </div>
                        @error('statusbayar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-success me-0">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
</div>
</div>
</section>
</div>
@endsection