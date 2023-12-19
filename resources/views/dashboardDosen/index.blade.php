<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dosen</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin') }}/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('admin') }}/images/LOGO-UPI.jpg" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" />
    <!-- tokenfield -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.css"
        integrity="sha512-wcf2ifw+8xI4FktrSorGwO7lgRzGx1ld97ySj1pFADZzFdcXTIgQhHMTo7tQIADeYdRRnAjUnF00Q5WTNmL3+A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .tokenfield .token {
            margin: -1px 1px 1px 1px;
            height: 25px;
            line-height: 22px;
            color: #fff;
            background-color: #0b5ed7
        }

        .tokenfield .token a {
            color: #FFFFFF;
            text-decoration: none;
        }
    </style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="index.html"><img src="{{asset('admin') }}/images/logo-kimia.png" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('admin') }}/images/logo-mini.svg" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <img src="{{asset('admin') }}/images/faces/{{Auth::user()->avatar}}" alt="profile"/>
              <span class="nav-profile-name">{{Auth::user()->name}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="{{url('auth/logout')}}">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('dataDosen.index')}}">
              <i class="mdi mdi-file-document-box-outline menu-icon"></i>
              <span class="menu-title">Dosen</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @include('dashboard.pesan')
          <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                    @if(isset($data))
                    <form action="{{route('dataDosen.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text"
                              class="form-control form-control-sm" name="nama" id="nama" aria-describedby="helpId" placeholder="Nama" value="{{$data->nama}}">
                          </div>
                          <div class="mb-3">
                              <label for="nip" class="form-label">NIP</label>
                              <input type="text"
                                class="form-control form-control-sm" name="nip" id="nip" aria-describedby="helpId" placeholder="NIP" value="{{$data->nip}}">
                          </div>
                          <div class="mb-3">
                              <label for="email" class="form-label">E-mail</label>
                              <input type="text"
                                class="form-control form-control-sm" name="email" id="email" aria-describedby="helpId" placeholder="e-mail" value="{{$data->email}}">
                          </div>
                          <div class="mb-3">
                            <label for="jabatan">Jabatan:</label>
                            <select name="jabatan" id="jabatan">
                              <option value="">-Pilih-</option>
                              <option value="Asisten Ahli" {{ $data->jabatan == "Asisten Ahli" ? "selected" : "" }}>Asisten Ahli</option>
                              <option value="Lektor" {{ $data->jabatan == "Lektor" ? "selected" : "" }}>Lektor</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="bidang">Bidang:</label>
                            <select name="bidang" id="bidang">
                              <option value="">-Pilih-</option>
                              <option value="Biokimia" {{ $data->bidang == "Biokimia" ? "selected" : "" }}>Biokimia</option>
                              <option value="Kimia Organik" {{ $data->bidang == "Kimia Organik" ? "selected" : "" }}>Kimia Organik</option>
                              <option value="Kimia Anorganik" {{ $data->bidang == "Kimia Anorganik" ? "selected" : "" }}>Kimia Anorganik</option>
                              <option value="Kimia Fisik" {{ $data->bidang == "Kimia Fisik" ? "selected" : "" }}>Kimia Fisik</option>
                              <option value="Kimia Analitik" {{ $data->bidang == "Kimia Analitik" ? "selected" : "" }}>Kimia Analitik</option>
                            </select>
                          </div>
                          {{-- <div class="mb-3">
                              <label for="no_hp" class="form-label">No HP</label>
                              <input type="text"
                                class="form-control form-control-sm" name="no_hp" id="no_hp" aria-describedby="helpId" placeholder="No HP" value="{{$data->no_hp}}">
                          </div> --}}
                          {{-- <div class="mb-3">
                              <label for="alamat" class="form-label">Alamat</label>
                              <input type="text"
                                class="form-control form-control-sm" name="alamat" id="alamat" aria-describedby="helpId" placeholder="Alamat" value="{{$data->alamat}}">
                          </div> --}}
                          <div class="mb-3">
                            <label for="scopus" class="form-label">Link Scopus</label>
                            <input type="text"
                              class="form-control form-control-sm" name="scopus" id="scopus" aria-describedby="helpId" placeholder="Scopus" value="{{$data->scopus}}">
                          </div>
                          <div class="mb-3">
                            <label for="scholar" class="form-label">Link Scholar</label>
                            <input type="text"
                              class="form-control form-control-sm" name="scholar" id="scholar" aria-describedby="helpId" placeholder="Scholar" value="{{$data->scholar}}">
                          </div>
                          <div class="mb-3">
                            <label for="sinta" class="form-label">Link Sinta</label>
                            <input type="text"
                              class="form-control form-control-sm" name="sinta" id="sinta" aria-describedby="helpId" placeholder="Sinta" value="{{$data->sinta}}">
                          </div>
                          @if ($data->foto)
                            <img style="max-width:100px;max-height:100px" src="{{ asset('foto/dosen') . '/' . $data->foto }}">
                          @endif
                          <div class="mb-3">
                              <label for="_foto" class="form-label">Foto</label>
                              <input type="file" class="form-control form-control-sm" name="_foto" id="_foto">   
                          </div>
                          <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
                    </form>
                    @else
                        <p>Data dengan email tersebut tidak ditemukan.</p>
                    @endif
                </div>  
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard  </a> templates</span>
      </div>
      </footer>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{asset('admin') }}/vendors/base/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="{{asset('admin') }}/vendors/chart.js/Chart.min.js"></script>
<script src="{{asset('admin') }}/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="{{asset('admin') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('admin') }}/js/off-canvas.js"></script>
<script src="{{asset('admin') }}/js/hoverable-collapse.js"></script>
<script src="{{asset('admin') }}/js/template.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('admin') }}/js/dashboard.js"></script>
<script src="{{asset('admin') }}/js/data-table.js"></script>
<script src="{{asset('admin') }}/js/jquery.dataTables.js"></script>
<script src="{{asset('admin') }}/js/dataTables.bootstrap4.js"></script>
<!-- End custom js for this page-->

<script src="{{asset('admin') }}/js/jquery.cookie.js" type="text/javascript"></script>

<!-- insert into your last tag body -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>


<!-- place this script before closing body tag --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>
<script>
  $(document).ready(function() {
      $('.summernote').summernote({
        height:100
      });
  });
</script>
@stack('child-scripts')

</body>

</html>