@extends('layout.dashtemp')

@section('admin-konten')
<div class="contaire">
    <section class="base">
        <h2 class="text-center">{{ $judul }}</h2>
        <hr class="style8">
        <form action="/keuangan/generate" method="post">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group row">
                        <label for="keterangan" class="col-sm-4 col-form-label">Pilih Bulan</label>
                        <div class="col-sm-8">
                            <select name="bulan" id="bulan">
                                <option value="disableselected">--Pilih Bulan--</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group row">
                        <label for="keterangan" class="col-sm-4 col-form-label">Pilih Tahun</label>
                        <div class="col-sm-8">
                            <select name="bulan" id="bulan">
                                <option value="disableselected">--Pilih Tahun--</option>
                                {{-- @foreach ($tahuns as $tahun)
                                <option value="{{ $tahun }}">{{ $tahun}}</option>
                                @endforeach --}}
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-outline-info" style="margin-bottom: 5px"><i
                            class="fas fa-search"></i></button>
                </div>
            </div>
            <hr class="style14">
        </form>
    </section>
</div>
@endsection