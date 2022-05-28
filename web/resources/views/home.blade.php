@php
$path_web_gemol    = "/";
$path_login        = "login";
$path_logout       = "logout";
$path_registrasi   = "registrasi";
$path_main         = "/admin";
$path_img          = "/img";
$path_vendor       = "/vendor";
$path_css          = "/css";
$path_js           = "/js";
// $path_setting_admin= "setting_admin.php";


$path_ulasan = "/ulasan";
$path_testimoni = "/testimoni";

$path_brg          = "/barang";
$path_pengeluaran  ="/pengeluaran";
$path_export       = "/eksport";

$path_penjualan    ="/penjualan";
$path_pembeli      ="/pembeli";

@endphp
@extends('layouts/main')
@section('isi konten')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="row">
        <div class="col">
            @if (session()->has('pesanSukses'))
            <div class="alert alert-success" role="alert">
                {{ session('pesanSukses') }}
            </div>
            @endif
            @if (session()->has('pesanError'))
            <div class="alert alert-warning" role="alert">
                {{ session('pesanError') }}
            </div>
            @endif
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- Pendapatan (bulanan) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                rerata (bulanan) di {{ $tahunIni }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="pendapatanBulanan"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pendapatan (tahunan) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Pendapatan ({{ $tahunIni }})</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="pendapatanTahunan"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pengeluaran (bulanan) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Pengeluaran rerata (bulanan) di {{ $tahunIni }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="pengeluaranBulanan"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pengeluaran (tahunan) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total Pengeluaran {{ $tahunIni }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="pengeluaranTahunan"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <!-- Pendapatan (bulanan) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-9 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Overview Pendapatan {{ $tahunIni }}</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Pilih Tahun:</div>
                            @foreach ($tahunYgTersedia as $t )
                                <a class="dropdown-item" href="/admin/{{ $t }}">{{$t}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pie Chart -->
        <div class="col-xl-3 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Total Item Terjual {{ $tahunIni }}</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Pilih Tahun:</div>
                            @foreach ($tahunYgTersedia as $t )
                                <a class="dropdown-item" href="/admin/{{ $t }}">{{$t}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    @php
                        $indeks = 0
                    @endphp
                    @foreach ($barangs as $b )
                    <div class="mt-1 text-center small">
                        <span class="text-left">
                            <div class="display-5 text-white fw-2" id="textPie{{ $indeks++ }}">{{ $b['nama_barang'] }} </div>
                            {{-- <i id="textPie{{ $indeks++ }}" class="" style="background-color: red"></i> {{ $b['nama_barang'] }} --}}
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-danger">Overview Pengeluaran {{ $tahunIni }}</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Pilih Tahun:</div>
                            @foreach ($tahunYgTersedia as $t )
                                <a class="dropdown-item" href="/admin/{{ $t }}">{{$t}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChartPengeluaran"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
             <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Penjualan</div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered display responsive" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>jumlah barang:</th>
                                        <th>nama barang :</th>
                                        <th>harga:</th>
                                        <th>total:</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $angka = 1
                                    @endphp
                                    @foreach($detailPenjualansFull as $d)
                                    <tr>
                                        <td>{{ $angka++}}</td>
                                        <td>{{ $d->created_at}}</td>
                                        <td>{{ $d->jumlah_barang }}</td>
                                        <td>{{ $d->Barang->nama_barang }}</td>
                                        <td>{{ $d->Barang->harga_barang }}</td>
                                        <td>{{ $d->Barang->harga_barang*$d->jumlah_barang }}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- akhir tabel --}}
        </div>
        <div class="col-md-12">
             <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-danger">Pengeluaran</div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="table-responsive">
                                <table id="table2" class="table table-striped table-bordered display responsive" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Keperluan:</th>
                                        <th>Total:</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $angka = 1
                                    @endphp
                                    @foreach($pengeluaransFull as $p)
                                    <tr>
                                        <td>{{ $angka++}}</td>
                                        <td>{{ $p->created_at}}</td>
                                        <td>{{ $p->nama_pengeluaran }}</td>
                                        <td>{{ $p->total_pengeluaran }}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- akhir tabel --}}
        </div>
    </div>
@endsection

@section('script')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="{{ $path_js }}/password-visibility.js"></script>
<script src="{{ $path_js }}/script.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.9/css/dataTables.responsive.css"></script>

<script>
    $(document).ready(function () {
        $('#table').dataTable({
            dom: 'Bfrtip',
            buttons: [
                {extend: 'copy', className: "btn btn-primary ms-1 bi bi-clipboard"},
                {extend: 'excel', className: "btn btn-primary bi bi-file-earmark-spreadsheet"},
                {extend: 'pdf', className: "btn btn-primary bi bi-file-earmark-pdf"},
                {extend: 'print', className: "btn btn-primary bi bi-printer"},
                // 'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
    $(document).ready(function () {
        $('#table2').dataTable({
            dom: 'Bfrtip',
            buttons: [
                {extend: 'copy', className: "btn btn-primary ms-1 bi bi-clipboard"},
                {extend: 'excel', className: "btn btn-primary bi bi-file-earmark-spreadsheet"},
                {extend: 'pdf', className: "btn btn-primary bi bi-file-earmark-pdf"},
                {extend: 'print', className: "btn btn-primary bi bi-printer"},
                // 'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });

//     $('.table').DataTable( {
//     responsive: {
//         details: {
//             display: $.fn.dataTable.Responsive.display.childRowImmediate
//         }
//     }
// } );


    // $(document).ready(function () {
    //         $(".table").DataTable();
    //     });
</script>
<!-- Bootstrap core JavaScript-->
<script src ="{{ $path_vendor}}/jquery/jquery.min.js"></script>
 <script src="{{ $path_vendor}}/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="{{ $path_vendor}}/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="{{ $path_js }}/sb-admin-2.min.js"></script>

 <!-- Page level plugins -->
 <script src="{{ $path_vendor }}/chart.js/Chart.min.js"></script>


 <script>
     //CHART AREA
    var barangs = {!! json_encode($barangs->toArray()) !!};
    var d_penjualans = {!! json_encode($detailPenjualans->toArray()) !!};
    var pengeluarans = {!! json_encode($pengeluarans->toArray()) !!};

    jan = 0;
    feb = 0;
    mar = 0;
    apr = 0;
    may = 0;
    jun = 0;
    jul = 0;
    aug = 0;
    sep = 0;
    okt = 0;
    nov = 0;
    des = 0;
    function totalPendapatan(bulan, total){
        if(bulan == '01'){
            jan += total
        }
        else if(bulan == '02'){
            feb += total
        }
        else if(bulan == '03'){
            mar += total
        }
        else if(bulan == '04'){
            apr += total
        }
        else if(bulan == '05'){
            may += total
        }
        else if(bulan == '06'){
            jun += total
        }
        else if(bulan == '07'){
            jul += total
        }
        else if(bulan == '08'){
            aug += total
        }
        else if(bulan == '09'){
            sep += total
        }
        else if(bulan == '10'){
            okt += total
        }
        else if(bulan == '11'){
            nov += total
        }
        else{
            des += total
        }

    }

    d_penjualans.forEach(i => {
        //dapetin bulan aja
        let bulan = i['created_at'].slice(5,7);
        barangs.forEach(j =>{
            if (j['id']==i['barang_id']){
                totalPendapatan(bulan, parseInt(i['jumlah_barang']) * j['harga_barang'] )
            }
        })
    });
    list_pendapatan = [jan,feb,mar,apr,may,jun,jul,aug,sep,okt,nov,des];


    jan = 0;
    feb = 0;
    mar = 0;
    apr = 0;
    may = 0;
    jun = 0;
    jul = 0;
    aug = 0;
    sep = 0;
    okt = 0;
    nov = 0;
    des = 0;
    jumlah_pengeluarans = 0
    pengeluarans.forEach(i => {
        //dapetin bulan aja
        let bulan = i['created_at'].slice(5,7);
        totalPendapatan(bulan,parseInt(i['total_pengeluaran']))
    });
    list_pengeluaran = [jan,feb,mar,apr,may,jun,jul,aug,sep,okt,nov,des];



    function rata_rata(array) {
        var total = 0;
        var count = 0;

        array.forEach(function(item, index) {
            total += item;
            count++;
        });

        return Math.round(total / count*100)/100;
    }

    function jumlah(array){
        var sum = 0;
        for (let i = 0; i < array.length; i++) {
            sum += array[i];
        }

        return sum
    }


    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

        //pendapatan rerata bulan
        document.getElementById('pendapatanBulanan').innerHTML = "Rp."+ number_format(rata_rata(list_pendapatan));

        //pengeluaran rerata bulan
        document.getElementById('pengeluaranBulanan').innerHTML = "<span class='badge rounded-pill bg-danger text-white rounded'><i class='bi bi-dash-circle'></i></span>" + "Rp." + number_format(rata_rata(list_pengeluaran));

        //pendapatan total tahun ini
        document.getElementById('pendapatanTahunan').innerHTML = "Rp."+ number_format(jumlah(list_pendapatan));

        //pengeluaran total tahun ini
        document.getElementById('pengeluaranTahunan').innerHTML = "<span class='badge rounded-pill bg-danger text-white rounded'><i class='bi bi-dash-circle'></i></span>" + "Rp." + number_format(jumlah(list_pengeluaran));



    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Mendapatkan",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: list_pendapatan,
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function (value, index, values) {
                            return 'Rp.' + number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function (tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });
    var ctx = document.getElementById("myAreaChartPengeluaran");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Berkurang",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "red",
                pointRadius: 3,
                pointBackgroundColor: "red",
                pointBorderColor: "pink",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: list_pengeluaran,
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function (value, index, values) {
                            return 'Rp.' + number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function (tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });

</script>

<script>
    //CHART PIE
    var barangs = {!! json_encode($barangs->toArray()) !!};
    var d_penjualans = {!! json_encode($detailPenjualans->toArray()) !!};
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';


    //menyiapkan arr untuk build pie chart
    var id_brg = [];
    var labels = [];
    var data = [];
    var colors = [];
    var colors2 = [];
    barangs.forEach(e => {
        data.push(0)
        labels.push(e['nama_barang'])
        id_brg.push(e['id'])
    });


    //bulid warna untuk pie chart
    for(i=0; i<=labels.length; i++){
        let random = Math.floor(Math.random()*16777215).toString(16);
        colors.push("#"+random);
        colors2.push("#545454");
        // document.getElementById('myID').style.backgroundColor = 'green';
        // document.getElementById("textPie1"+ i.toString()).style.color = colors
    }




    //mengecek dan menambahkan barang_id yg sesuai di d_penjualans ke arr data
    d_penjualans.forEach(e => {
        id_brg.forEach(j =>{
            if(j == e['barang_id'] ){
                data[id_brg.indexOf(j)] += parseInt(e['jumlah_barang'])
            }
        })
    });



    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: labels,
        datasets: [{
        data: data,
        backgroundColor: colors,
        hoverBackgroundColor: colors2,
        hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
    },
    options: {
        maintainAspectRatio: false,
        tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
        },
        legend: {
        display: false
        },
        cutoutPercentage: 80,
    },
    });

    // let i = 0;
    // colors.forEach(e=>{
    //     document.getElementById("textPie"+i).style.backgroundColor = e;
    //     i++;
    // })

    for(i=0; i<=colors.length;  i++){
        document.getElementById("textPie"+i).style.backgroundColor = colors[i];
    }

</script>



</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
@endsection
