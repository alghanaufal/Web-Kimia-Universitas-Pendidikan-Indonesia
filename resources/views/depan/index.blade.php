<!DOCTYPE html>
<html>
  <head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="images/LogoUPI.png" />
    <title>KIMIA UPI</title>

    <!-- slider stylesheet -->
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css"
    />

    <!-- font awesome style -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('depan') }}/css/bootstrap.css" />

    <!-- fonts style -->
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:400,600,700|Roboto:400,700&display=swap"
      rel="stylesheet"
    />

    <!-- Custom styles for this template -->
    <link href="{{ asset('depan') }}/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('depan') }}/css/responsive.css" rel="stylesheet" />
  </head>

  <body>
    <div class="hero_area">
      <!-- header section strats -->
      <header class="header_section">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
            <a class="navbar-brand" href="{{route('depan.index')}}">
              <img src="{{ asset('depan') }}/images/LogoKimia2.png" alt="" />
            </a>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div
                class="d-flex flex-column flex-lg-row align-items-center w-100 justify-content-between"
              >
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="{{route('depan.index')}}"
                      >Home<span class="sr-only">(current)</span></a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('depan.lembaga')}}">Lembaga</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('depan.akademik')}}">Akademik</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('depan.riset')}}">Riset</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('depan.pengabdian')}}">Pengabdian</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('depan.jurnal')}}">jurnal</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('depan.mahasiswa')}}">Mahasiswa</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('depan.informasi.berita')}}">Informasi</a>
                  </li>
                </ul>
                <div class="login_btn-contanier ml-0 ml-lg-5">
                  <form class="form-inline">
                    <input type="search" placeholder="Search" />
                    <button
                      class="btn my-2 my-sm-0 nav_search-btn"
                      type="submit"
                    ></button>
                  </form>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <!-- slider section -->
      <section class="about_section layout_padding">
        <div class="container">
          <div class="custom_heading-container">
            <h2 class="home-title">PROGRAM STUDI KIMIA</h2>
          </div>
          <div class="custom_heading-container">
            <p>
              Fakultas Pendidikan Matematika & Pengetahuan Alam <br />
              Universitas Pendidikan Indonesia
            </p>
          </div>
          <div class="home-desc">
            <p>
              Cikal bakal Jurusan Pendidikan Kimia FPMIPA IKIP Bandung adalah
              Jurusan Ilmu Pasti Alam Perguruan Tinggi Pendidikan Guru (PTPG)
              yang lahir pada tahun 1954. Pada tahun 1983 Depdikbud mengadakan
              reorganisasi perguruan tinggi negeri, sejak itu nama FKIE berubah
              menjadi FPMIPA serta nama Jurusan Pendidikan Kimia mulai dipakai.
            </p>
          </div>
        </div>
      </section>
      <div class="vidio-box">
        <iframe
          width="560"
          height="315"
          src="https://www.youtube.com/embed/GsTkdWlEAc4"
          title="YouTube video player"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowfullscreen
        ></iframe>
      </div>
    </div>
    <section class="health_section layout_padding">
      <div class="health_carousel-container">
      <h3 class="main_title">update terbaru</h3>
        <!-- <div class="d-flex justify-content-between">
          
        </div> -->
        <a href="{{route('depan.informasi.berita')}}" class="custom-btn btn-15"> 
          Berita Lainnya
        </a>
        {{-- <button type="button" class="btn btn-info" href="{{route('depan.informasi.berita')}}"> Berita Lainnya </button> --}}
        <div class="carousel-wrap layout_padding2">
          <div class="owl-carousel owl-2">
            @php $counter = 0 @endphp
            @foreach ($data as $item)
              @if ($item->tipe === 'Berita')
                @if ($counter < 5)
                  <div class="indexnews-container">
                    {{-- <a href="{{ route('depan.informasi.detail', ['id' => $item->id]) }}"> --}}
                    <img src="{{ asset('foto/informasi') . '/' . $item->foto }}" alt="" class="img-berita">
                    <p class="berita-tanggal">{{ $item->tgl_mulai }}</p>
                    <p class="berita-title">{{ $item->judul }}</p>
                    <div class="berita-desc">{!! $item->isi !!}</div>
                  </div>
                  @php $counter++ @endphp
                @else
                  @break
                @endif
              @endif
            @endforeach
          </div>
        </div>
        
      </div>
      <div class="health_carousel-container">
        <h3 class="main_title">agenda</h3>
        <!-- <div class="btn btn-info">
          
        </div> -->
        <a href="{{route('depan.informasi.agenda')}}" class="custom-btn btn-15"> 
          Agenda Lainnya
          </a>
        <div class="carousel-wrap layout_padding2">
          <div class="owl-carousel owl-2">
            @foreach ($data as $item)
                @if ($item->tipe === 'Agenda')
                <div class="indexnews-container">
                  {{-- <a href="{{ route('depan.informasi.detail', ['id' => $item->id]) }}"> --}}
                    <img src="{{ asset('foto/informasi') . '/' . $item->foto }}" alt="" class="img-berita">
                    <p class="berita-tanggal">{{ $item->tgl_mulai }}</p>
                    <p class="berita-title">{{ $item->judul }}</p>
                    <div class="berita-desc">{!! $item->isi !!}</div>
                </div>
                @endif
            @endforeach
          </div>
        </div>
      </div>
    </section>
<!-- info section -->
<section class="info_section layout_padding2">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="info_contact">
          <h4>Program Studi Kimia</h4>
          <div class="box">
            <div class="img-box">
              <img src="{{ asset('depan') }}/images/telephone-symbol-button.png" alt="" />
            </div>
            <div class="detail-box">
              <h6>Jl.Dr.Setiabudi No. 229 Bandung</h6>
            </div>
          </div>
          <div class="box">
            <div class="img-box">
              <img src="{{ asset('depan') }}/images/email.png" alt="" />
            </div>
            <div class="detail-box">
              <h6>jp_pend_kimia@upi.edu</h6>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="info_menu">
          <h4>Tautan Akademik</h4>
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">SPOT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">SINO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">SIAS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Perwalian</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">MRS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">SINNDO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Evaluasi PBM</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Silabus</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Direktori File</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">MBKM</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-3">
        <div class="info_menu">
          <h4>Tautan Lembaga</h4>
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">UPI</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Direktorat Kemahasiswaan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Perpustakaan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Fakultas PMIPA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Webmail</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Portal Jurnal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Repository</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Digital Library</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">PMB</a>
            </li>
          </ul>
        </div>
      </div>
      <!-- <div class="col-md-6">
      <div class="info_news">
        <h4>
          newsletter
        </h4>
        <form action="">
          <input type="text" placeholder="Enter Your email">
          <div class="d-flex justify-content-center justify-content-end mt-3">
            <button>
              Subscribe
            </button>
          </div>
        </form>
      </div>
    </div> -->
    </div>
  </div>
</section>

<!-- end info section -->

<!-- footer section -->
<!-- footer section -->

<script type="text/javascript" src="{{ asset('depan') }}/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="{{ asset('depan') }}/js/bootstrap.js"></script>
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"
></script>
<script type="text/javascript">
  $(".owl-carousel").owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    navText: [],
    autoplay: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 4,
      },
    },
  });
</script>
<script type="text/javascript">
  $(".owl-2").owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    navText: [],
    autoplay: true,

    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 4,
      },
    },
  });
</script>
</body>
</html>
