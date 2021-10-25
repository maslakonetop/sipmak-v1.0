@extends('layout.dashtemp')
@section('admin-konten')

<head>
    <title>Pencarian Autocomplete di Laravel Menggunakan Ajax</title>
    {{--
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" /> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
</head>

<body>

    <div class="container">
        <section class="base">
            @if (session()->has('berhasil'))

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('berhasil') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <h2 class="text-center">Data Ijin Pemutihan Baru</h2>
            <hr class="style14">
            <form action="/pemutihan/karangsuci/cari" method="GET">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        {{-- <select class="cari form-control" name="cari" id="nama_jenazah"></select> --}}

                        <input type="text" name="cari" class="form-control mt-3" placeholder="Cari nama jenazah"
                            value="{{ old('cari') }}">
                    </div>
                    <div class="col-md-1">
                        {{-- <input type="submit" class="btn btn-outline-info" value="CARI"> --}}
                        <button type="submit" class="btn btn-outline-info mb-3"><i class="fas fa-search"></i></button>
                    </div>
                    <div class="col-md-3">
                        {{-- <input type="submit" class="btn btn-outline-info" value="CARI"> --}}
                        <a href="/karangsuci/create" class="btn btn-outline-success mt-3"><i
                                class="fas fa-plus-circle"></i> Data Baru</a>
                    </div>
                </div>
            </form>
            <hr class="style8">
            <div class="table-responsive">
                <table class="table table-sm table-hover table-striped table-bordered" style="width: 100%">
                    <thead>
                        <th scope="col" class="text-center text-light bg-info">ID</th>
                        <th scope="col" class="text-center text-light bg-info">No Buku / Plat</th>
                        <th scope="col" class="text-center text-light bg-info">Nama Pemohon</th>
                        <th scope="col" class="text-center text-light bg-info">Nama Jenazah</th>
                        <th scope="col" class="text-center text-light bg-info">Usia</th>
                        <th scope="col" class="text-center text-light bg-info">Wafat Jenazah</th>
                        <th scope="col" class="text-center text-light bg-info">Status Ijin</th>
                        <th scope="col" class="text-center text-light bg-info">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <tr>
                            <td class="text-center text-dark">
                                {{ $row->id }}
                            </td>
                            <td class="text-center text-dark">
                                {{ $row->kode }}-00{{ $row->nobuku_plat }}
                            </td>
                            <td class="text-center text-dark">
                                {{ $row->nama_pemohon }}
                            </td>
                            <td class="text-center text-dark">
                                {{ $row->nama_jenazah }}
                            </td>
                            <td class="text-center text-dark">
                                {{ $row->usia }}
                            </td>
                            <td class="text-center text-dark">
                                {{ \Carbon\Carbon::parse($row->wafat_jenazah)->locale('id')->translatedFormat('l, d F
                                Y') }}
                            </td>
                            <td class="text-center text-dark">
                                {{ $row->statusijin }}
                            </td>
                            <td>
                                <a href="/pemutihan/karangsuci/form/{{ $row->id }}" class="btn btn-primary"><i
                                        class="fab fa-leanpub"></i></a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                Halaman : {{ $data->currentPage() }} <br />
                Jumlah Data : {{ $data->total() }} <br />
                Data Per Halaman : {{ $data->perPage() }} <br />
                <br>
                {{ $data->links('pagination::bootstrap-4') }}
            </div>
        </section>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $('.cari').select2({
    placeholder: 'Cari...',
    ajax: {
      url: '/cari',
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results:  $.map(data, function (item) {
            return {
              text: item.nama_jenazah,
              id: item.id
            }
          })
        };
      },
      cache: true
    }
  });

    </script>
</body>
@endsection