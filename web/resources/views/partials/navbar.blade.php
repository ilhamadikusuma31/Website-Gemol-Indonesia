<nav class="navbar navbar-expand topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    {{-- <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form> --}}

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        {{-- <style>
            .dropdown-menu {
            height: auto;
            max-height: 200px;
            overflow-x: hidden;
            }
        </style> --}}
        <!-- Nav Item - Alerts -->
        @php
            use App\Models\PenjualanTemp;
            use App\Models\DetailPenjualanTemp;
            $penjualan_t = PenjualanTemp::select("*")->orderBy("created_at","desc")->get();
        @endphp
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter" id="notifDot">{{ PenjualanTemp::all()->count() }}</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    pesanan!
                </h6>

                @foreach ($penjualan_t as $pt)
                    <a href="#" data-toggle="modal" data-target="#popUpConfirm{{ $pt->id }}" class="dropdown-item d-flex align-items-center">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">{{ $pt->created_at }}</div>
                            <span class="font-weight-bold">{{ $pt->Pembeli->nama_pembeli }}</span>
                        </div>
                    </a>
                @endforeach

                {{-- <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-success">
                            <i class="fas fa-donate text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 7, 2019</div>
                        $290.29 has been deposited into your account!
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-warning">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 2, 2019</div>
                        Spending Alert: We've noticed unusually high spending for your account.
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a> --}}
            </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                {{-- <span class="badge badge-danger badge-counter">7</span> --}}
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="<?= $path_img; ?>/admin/undraw_profile_1.svg"
                            alt="...">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                            problem I've been having.</div>
                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="<?= $path_img; ?>/undraw_profile_2.svg"
                            alt="...">
                        <div class="status-indicator"></div>
                    </div>
                    <div>
                        <div class="text-truncate">I have the photos that you ordered last month, how
                            would you like them sent to you?</div>
                        <div class="small text-gray-500">Jae Chun · 1d</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="<?= $path_img; ?>/undraw_profile_3.svg"
                            alt="...">
                        <div class="status-indicator bg-warning"></div>
                    </div>
                    <div>
                        <div class="text-truncate">Last month's report looks great, I am very happy with
                            the progress so far, keep up the good work!</div>
                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                            alt="...">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div>
                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                            told me that people say this to all dogs, even if they aren't good...</div>
                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @auth
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->username }}</span>
                @endauth
                <img class="img-profile rounded-circle" src = "{{ $path_img }}/admin/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#popUpConfirmPW">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                {{-- <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                </a> --}}
                <div class="dropdown-divider"></div>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400" data-target="#popUpConfirmLogout"></i>Logout</button>
                </form>
            </div>
        </li>
    </ul>
</nav>


<!-- Logout Modal-->
<div class="modal fade" id="popUpConfirmLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">mau keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Logout" jika kamu yakin.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= $path_logout; ?>">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- Confirm PW Modal-->
<div class="modal fade" id="popUpConfirmPW" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Password</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                    <form id="formConfirmPW" method="POST" action="/setting-akun">
                        {{-- @method('autentikasi') --}}
                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <input class="form-control" type="password" placeholder="Password" id="password1" name="password" autocomplete="off" required>
                                    <span class="form-control-focus"></span>
                                </div>
                                <div class="col-2 mt-2 ms-1">
                                    <div class="input-group-addon" onclick="passwordVisibility(1);">
                                        <i class="fa fa-eye" id="showPass1"></i>
                                        <i class="fa fa-eye-slash d-none" id="hidePass1"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" form="formConfirmPW" type="submit">Submit</button>
            </div>
        </div>
    </div>
</div>


@foreach ($penjualan_t as $pt)
<!-- confirm si Admin untuk pemesanan baru yg masuk, modal-->
<div class="modal fade" id="popUpConfirm{{ $pt->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @php
                    $id_pembeli =  $pt->Pembeli->id;
                    $nama_pembeli =  $pt->Pembeli->nama_pembeli;
                    $alamat_pembeli =  $pt->Pembeli->alamat_pembeli;
                    $no_telp_pembeli =  $pt->Pembeli->no_telp_pembeli;
                @endphp
                <h5 class="modal-title" id="exampleModalLabel" value="" >si {{ $nama_pembeli }} mau beli ini?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "submit" jika kamu yakin ingin simpan data pemesanan ini
                <div class="container">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered display responsive" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Barang:</th>
                                    <th>Harga:</th>
                                    <th>Jumlah:</th>
                                    <th>Total Harga:</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $angka=1;
                                    $detail_penjualan_t = DetailPenjualanTemp::with(["Barang","Penjualan"])->where("penjualan_id", $pt->id)->get();
                                @endphp
                                @foreach ($detail_penjualan_t as $dpt)
                                    @php
                                        $id_detail_penjualan = $dpt->id;
                                        $id_brg = $dpt->Barang->id;
                                        $nama_brg = $dpt->Barang->nama_barang;
                                        $harga_brg = $dpt->Barang->harga_barang;
                                        $jumlah_brg = $dpt->jumlah_barang;
                                        $total = $harga_brg*$jumlah_brg;
                                        // dd($id_brg);
                                    @endphp
                                    <tbody>
                                        <tr>
                                            <td>
                                                {{ $angka++ }}
                                            </td>
                                            <td>
                                                {{ $nama_brg}}
                                            </td>
                                            <td>
                                                {{ $harga_brg }}
                                            </td>
                                            <td>
                                                {{ $jumlah_brg }}
                                            </td>
                                            <td>
                                                {{ $total }}
                                            </td>
                                        </tr>
                                    </tbody>
                                    <form action="/pesanan-di-acc" id="operKeDB" method="POST">
                                        @csrf
                                        <input type="hidden" name="nama_pembeli" value="{{ $nama_pembeli }}">
                                        <input type="hidden" name="alamat_pembeli" value="{{ $alamat_pembeli }}">
                                        <input type="hidden" name="no_telp_pembeli" value="{{ $no_telp_pembeli }}">
                                        @foreach ($detail_penjualan_t as $dpt)
                                        <input type="hidden" name="nama_barang[]" value="{{ $dpt->Barang->id }}">
                                        @endforeach
                                        @foreach ($detail_penjualan_t as $dpt)
                                        <input type="hidden" name="jumlah_barang[]" value="{{ $dpt->jumlah_barang }}">
                                        @endforeach
                                        @foreach ($detail_penjualan_t as $dpt)
                                        <input type="hidden" name="id_detail_penjualan[]" value="{{ $dpt->id }}">
                                        @endforeach
                                        <input type="hidden" name="id_penjualan" value="{{ $pt->id }}">
                                    </form>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id='modal-footer'>
                {{-- cancel --}}
                <a href="/pesanan-di-tolak/{{ $pt->id }}"  class="btn btn-success">Batal</a>
                {{-- submit --}}
                <button class="btn btn-danger" form="operKeDB">submit</button>
                {{-- --}}
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="modal fade" id="popUpConfirmNotif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ada Pesanan Baru Nih!!</h5>
                <button id="closeNotif" class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                mohon refresh halaman ini dan cek di klik ikon lonceng<i class="bi bi-bell-fill"></i>anda
            </div>
            {{-- <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" form="formConfirmPW" type="submit">Submit</button>
            </div> --}}
        </div>
    </div>
</div>
@php
    $count = PenjualanTemp::all()->count();
@endphp
<script src="/js/app.js"></script>
<script>
    let angka = {{ $count }};
    window.Echo.channel("kirimSinyalPesan").listen("NotifPenjualan", (event) => {
        angka+=1;
        document.getElementById('notifDot').innerHTML = angka ;
        // var audio = new Audio("/js/pesananSoundEfek.mp3");
        // audio.play();
        var audio2 = new Audio("/js/pesananSoundEfek2.mp3");
        audio2.play();
        showPopUpNotif();

    })
</script>
<script>
    // $(document).ready(function() {
    //         $("a").click(function(event) {
    //             event.preventDefault();
    //             alert("The required page will not be open");
    //         });
    //     });
    function showPopUpNotif(e){
        $('#popUpConfirmNotif').modal('show');
    };

</script>

