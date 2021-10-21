@extends('layout.dashtemp')
@section('admin-konten')
<div class="container">
    <section class="base">
        <h5 style="color: black;">Selamat datang di Aplikasi Back End Sipmak v1.0</h5>
        <hr class="style8">
        <h6 class="text-info">Data Ijin</h6>
        <div class="col">
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Ijin Dikeluarkan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-database fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Data Baru</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $baru }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Data Pemutihan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pemutihan }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="far fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Data Expired</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $expired }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div id="piechart"></div>
                </div>
                <div class="col-md-6">
                    <div id="tahunchart"></div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div id="statuschart"></div>
                </div>
                <div class="col-md-6">
                    <div id="makamchart"></div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    var total = {{ $data }};
    var baru = {{ $baru }};
    var pemutihan = {{ $pemutihan }};
    var expired = {{ $expired }};

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart(){
        var data = google.visualization.arrayToDataTable([
            ['Nama Data', 'Data'],
            [ 'total', baru], 
            ['Pemutihan', pemutihan],
            ['Expired', expired]
        ]);
        var options = {
                title: 'Data Ijin',          
                curveType: 'function',
                legend: { position: 'bottom' },
                is3D:true
            };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
    }
</script>
<script>
    var tahun = {{ $tahun }};
    var tahunsatu = {{ $tahunsatu }};
    var tahundua = {{ $tahundua }};
    var tahuntiga = {{ $tahuntiga }};
    var tahunempat = {{ $tahunempat }};

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart(){
        var data = google.visualization.arrayToDataTable([
            ['Tahun', 'Data', {role: 'style'}],
            [ '2017', tahun, '#7FFFD4'],
            [ '2018', tahunsatu, '#DEB887'],
            [ '2019', tahundua, '#6495ED'],
            [ '2020', tahuntiga, '#FF1493'],
            [ '2021', tahunempat, '#228B22']     
        ]);
        var options = {
                title: 'Data Status Ijin berdasarkan Tahun',          
                curveType: 'function',
                is3D:true
            };
        var chart = new google.visualization.ColumnChart(document.getElementById('tahunchart'));
            chart.draw(data, options);
    }
</script>
<script>
    var anak = {{ $anak }};
    var dewasa = {{ $dewasa }};

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart(){
        var data = google.visualization.arrayToDataTable([
            ['Tahun', 'Data', {role: 'style'}],
            [ 'Dewasa', dewasa, '#F08080'],
            [ 'Anak', anak, '#191970']    
        ]);
        var options = {
                title: 'Data Status Ijin berdasarkan Keterangan Jenazah',          
                curveType: 'function',
                is3D:true
            };
        var chart = new google.visualization.PieChart(document.getElementById('statuschart'));
            chart.draw(data, options);
    }
</script>
<script>
    var karangsuci = {{ $karangsuci }};
    var kerkoff = {{ $kerkoff }};

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart(){
        var data = google.visualization.arrayToDataTable([
            ['Lokasi', 'Data', {role: 'style'}],
            [ 'Karang Suci', karangsuci, '#00FF7F'],
            [ 'Kerkoff Arimatea', kerkoff, '#FF6347']    
        ]);
        var options = {
                title: 'Data Status Ijin berdasarkan Keterangan Jenazah',          
                curveType: 'function',
                pieHole: 0.4
            };
        var chart = new google.visualization.PieChart(document.getElementById('makamchart'));
            chart.draw(data, options);
    }
</script>

@endsection