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
        <h3 class="text-center">{{ $judul }} No Buku : {{ $data->kode }}-{{ $data->nobuku_plat }}</h3>
        <h5 class="text-center">A/N {{ $data->nama_pemohon }} untuk Nama Jenazah a/n {{ $data->nama_jenazah }}</h5>
        <hr class="style14">
        <form action="/pemutihan/kerkoff/update/{{ $data->id }}" method="post">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="id" class="col-sm-4 col-form-label">Nobuku_plat</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" value="KR" readonly>
                            <input type="hidden" name="kode" id="kode" class="form-control" value="KR">
                        </div>
                        <label for="separator" class="col-sm-1 col-form-label">-</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="{{ $data->nobuku_plat }}" readonly>
                            <input type="hidden" name="nobuku_plat" id="nobuku_plat" class="form-control"
                                value="{{ $data->nobuku_plat }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_pemohon" class="col-sm-4 col-form-label">Nama Pemohon</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_pemohon" id="nama_pemohon"
                                class="form-control @error('nama_pemohon') is-invalid @enderror"
                                value="{{ $data->nama_pemohon }}" autofocus required>
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
                                value="{{ $data->nama_jenazah }}" required>
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
                            <input type="text" class="form-control"
                                value="{{ \Carbon\Carbon::parse($data->lahir_jenazah)->locale('id')->translatedFormat('l, d F Y') }}"
                                readonly>
                            <input type="hidden" name="lahir_jenazah" id="lahir_jenazah"
                                value="{{ $data->lahir_jenazah }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="wafat_jenazah" class="col-sm-4 col-form-label">Wafat Jenazah</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('wafat_jenazah') is-invalid @enderror"
                                value="{{ \Carbon\Carbon::parse($data->wafat_jenazah)->locale('id')->translatedFormat('l, d F Y') }}"
                                readonly>
                            <input type="hidden" name="wafat_jenazah" id="wafat_jenazah"
                                value="{{ $data->wafat_jenazah }}">
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
                    <a href="/pemutihan/kerkoff" class="btn btn-info" style="margin-top: 75px"><i
                            class="far fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="lokasimakam1" class="col-sm-4 col-form-label">Lokasi Makam</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ $data->lokasimakam1 }}" readonly>
                            <input type="hidden" name="lokasimakam1" id="lokasimakam1"
                                value="{{ $data->lokasimakam1 }}">
                            <input type="hidden" name="lokasimakam2" id="lokasimakam2"
                                value="{{ $data->lokasimakam2 }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ijinmulai" class="col-sm-4 col-form-label">Ijin Berlaku</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control"
                                value="{{ \Carbon\Carbon::now()->locale('id')->translatedFormat('l, d F Y') }}"
                                readonly>
                            <input type="hidden" name="ijinmulai" id="ijinmulai" value="{{ \Carbon\Carbon::now() }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="expired" class="col-sm-4 col-form-label">IIjin Expired</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control"
                                value="{{ \Carbon\Carbon::now()->addYear(2)->locale('id')->translatedFormat('l, d F Y') }}"
                                readonly>
                            <input type="hidden" name="" name="expired" id="expired"
                                value="{{ \Carbon\Carbon::now()->addYear(2) }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-sm-4 col-form-label">Keterangan Jenazah</label>
                        <div class="col-sm-8">
                            <select name="keterangan" id="keterangan">
                                <option value="disableselected">{{ $data->keterangan}}</option>
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
                                class="form-control @error('bayar') is-invalid @enderror" value="{{ $data->bayar }}"
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
                            <input type="text" value="PEMUTIHAN" class="form-control" name="statusijin"
                                class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="statusbayar" class="col-sm-4 col-form-label">Status Bayar</label>
                        <div class="col-sm-8">
                            <select name="statusbayar" id="statusbayar">
                                <option value="{{ $data->statusbayar }}">{{ $data->statusbayar }}</option>
                                <option value="BB">Belum Bayar</option>
                                <option value="LUNAS">Lunas</option>
                            </select>
                            {{-- <input type="text" value="{{ $data->statusbayar }}" class="form-control" required> --}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-success me-0"><i class="fas fa-file-import"></i>
                            Update</button>
                    </div>
                </div>
            </div>
        </form>
</div>
</div>
</section>
</div>
@endsection