<x-guest-layout>
    <div class="wpo-blog-hero-area">
        <div class="container">
            <div class="sortable-gallery">
                <div class="gallery-filters"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="wpo-hero-slider mb-3">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach ($Banner->where('isActive', true) as $Banners)
                                        <div class="swiper-slide">
                                            <div class="slide-inner slide-bg-image" data-background="{{ asset($Banners->gambar) }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- end swiper-wrapper -->

                                <!-- swipper controls -->
                                <div class="swiper-pagination"></div>
                            </div>
                        </section>
                        <div class="wpo-blog-grids gallery-container clearfix">
                            @foreach ($BeritaAtas as $item)
                                {{-- 1-2, kedua beda bentuk  --}}
                                @if ($loop->index + 1 < 3)
                                    <div class="grid">
                                        <div class="img-holder">
                                            <img src="{{ asset($item->gambar) }}"
                                                @if ($loop->index + 1 == 2) height="275" @endif alt
                                                class="img img-responsive">
                                            <div class="wpo-blog-content">
                                                <h2><a href="{{ route('detail-berita', $item->slug) }}">{{ \Illuminate\Support\Str::limit($item->judul, $limit = 55, $end = '...') }}
                                                    </a></h2>
                                                <p>{!! \Illuminate\Support\Str::limit($item->isi, $limit = 125, $end = '...') !!} </p>
                                                <ul>
                                                    <li><img src="tlandingpage/assets/images/blog/blog-avater/img-1.jpg "
                                                            alt=""></li>
                                                    <li>By <a href="blog-single.html">{{ $item->User->name }}</a></li>
                                                    <li>{{ $item->created_at->Format('d M Y') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                {{-- ketiga keempat  --}}
                                @if ($loop->index + 1 == 3)
                                    <div class="grid s2">
                                @endif
                                @if ($loop->index + 1 > 2 && $loop->index + 1 < 5)
                                    {{-- @foreach ($collection as $item) --}}
                                    <div class="img-holder">
                                        <img src="{{ asset($item->gambar) }}" alt class="img img-responsive">
                                        <div class="wpo-blog-content">
                                            <h2><a href="{{ route('detail-berita', $item->slug) }}">{{ \Illuminate\Support\Str::limit($item->judul, $limit = 25, $end = '...') }}
                                                </a></h2>
                                            <ul>
                                                <li>By <a href="blog-single.html">{{ $item->User->name }}</a>
                                                </li>
                                                <li>{{ $item->created_at->Format('d M Y') }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    {{-- @endforeach --}}
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <section class="wpo-blog-pg-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-lg-6 col-12">
                    <div class="wpo-blog-content" style="border-radius: 1rem; overflow: hidden;">
                        <div class="post format-video">
                            <div class="entry-media video-holder">
                                <img src="https://images2.prokal.co/prokalco/files/berita/2023/02/10/2fbcbdf79c076afa541d7d7bdbd9ec43.jpg" alt>
                                <a href="{{ $getProfileWebsite->video??null }}" class="video-btn" data-type="iframe">
                                    <i class="fi flaticon-play"></i>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-6 col-12">
                    <h5 class="fs-5 text-secondary">Selamat Datang di</h5>
                    <h2 class="fw-bolder">DPMPTSP Kota Balikpapan</h2>
                    <p>{{ $getProfileWebsite->deskripsi??null }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="modallayanan" tabindex="-1" aria-labelledby="exampleModalLabel"x
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="section-title text-center mb-0 pb-2">
                        <p class="text-danger text-uppercase fw-bold mb-0 fs-6">Layanan Perizinan</p>
                        <h4 class="fs-2">Izin Membuat Bangunan</h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Dasar Hukum
                                    </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Persyaratan
                                    </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Masa Berlaku
                                    </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                    </div>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn w-100 bg-white text-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="wpo-breacking-news section-padding bg-reds bg-img-overlay item1-img py-4">
        <div class="container">
            <div class="wpo-section-title text-center mb-4">
                <h2 class="text-warning mb-0 pb-0 fs-1">Layanan Perizinan DPMPTSP</h2>
                <p class="text-white my-0 fs-5">Informasi Standar Pelayanan Perizinan 12 Teratas</p>
                
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                    <button type="button" class="btn btn-light w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan" data-toggle="modal" data-target="#modallayanan">
                        Izin Praktik Dokter
                    </button>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                    <button type="button" class="btn btn-light w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan" data-toggle="modal" data-target="#modallayanan">
                        Izin Praktik Dokter
                    </button>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                    <button type="button" class="btn btn-light w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan" data-toggle="modal" data-target="#modallayanan">
                        Izin Praktik Dokter
                    </button>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                    <button type="button" class="btn btn-light w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan" data-toggle="modal" data-target="#modallayanan">
                        Izin Praktik Dokter
                    </button>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                    <button type="button" class="btn btn-light w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan" data-toggle="modal" data-target="#modallayanan">
                        Izin Praktik Dokter
                    </button>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                    <button type="button" class="btn btn-light w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan" data-toggle="modal" data-target="#modallayanan">
                        Izin Praktik Dokter
                    </button>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                    <button type="button" class="btn btn-light w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan" data-toggle="modal" data-target="#modallayanan">
                        Izin Praktik Dokter
                    </button>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                    <button type="button" class="btn btn-light w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan" data-toggle="modal" data-target="#modallayanan">
                        Izin Praktik Dokter
                    </button>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                    <button type="button" class="btn btn-light w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan" data-toggle="modal" data-target="#modallayanan">
                        Izin Praktik Dokter
                    </button>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                    <button type="button" class="btn btn-light w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan" data-toggle="modal" data-target="#modallayanan">
                        Izin Praktik Dokter
                    </button>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                    <button type="button" class="btn btn-light w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan" data-toggle="modal" data-target="#modallayanan">
                        Izin Praktik Dokter
                    </button>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                    <button type="button" class="btn btn-light w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan" data-toggle="modal" data-target="#modallayanan">
                        Izin Praktik Dokter
                    </button>
                </div>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-warning fw-bold text-dark shadow-lg">
                    <span>Lihat Semua Perizinan</span>
                </button>
            </div>
        </div>
    </div>
    {{-- ONE PAGE --}}
    <div class="wpo-breacking-news section-padding">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="text-danger mb-0 pb-0 fw-bold fs-1">Layanan Perizinan DPMPTSP</h2>
                <p class="text-dark my-0 fs-5">Informasi Standar Pelayanan Perizinan</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-4">
                    <form action="" method="post">
                        @csrf
                        @method("POST")
                        <div>
                            <input type="text" name="berita" class="form-control" placeholder="Search here...">
                        </div>
                    </form>
                </div>
                <div class="col-12 mb-4">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                    <button type="button" class="btn btn-light border w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan" data-toggle="modal" data-target="#modallayanan">
                        Izin Praktik Dokter
                    </button>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                    <button type="button" class="btn btn-light border w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan" data-toggle="modal" data-target="#modallayanan">
                        Izin Praktik Dokter
                    </button>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                    <button type="button" class="btn btn-light border w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan" data-toggle="modal" data-target="#modallayanan">
                        Izin Praktik Dokter
                    </button>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                    <button type="button" class="btn btn-light border w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan" data-toggle="modal" data-target="#modallayanan">
                        Izin Praktik Dokter
                    </button>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                    <button type="button" class="btn btn-light border w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan" data-toggle="modal" data-target="#modallayanan">
                        Izin Praktik Dokter
                    </button>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                    <button type="button" class="btn btn-light border w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan" data-toggle="modal" data-target="#modallayanan">
                        Izin Praktik Dokter
                    </button>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                    <button type="button" class="btn btn-light border w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan" data-toggle="modal" data-target="#modallayanan">
                        Izin Praktik Dokter
                    </button>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                    <button type="button" class="btn btn-light border w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan" data-toggle="modal" data-target="#modallayanan">
                        Izin Praktik Dokter
                    </button>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                    <button type="button" class="btn btn-light border w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan" data-toggle="modal" data-target="#modallayanan">
                        Izin Praktik Dokter
                    </button>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                    <button type="button" class="btn btn-light border w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan" data-toggle="modal" data-target="#modallayanan">
                        Izin Praktik Dokter
                    </button>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                    <button type="button" class="btn btn-light border w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan" data-toggle="modal" data-target="#modallayanan">
                        Izin Praktik Dokter
                    </button>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                    <button type="button" class="btn btn-light border w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan" data-toggle="modal" data-target="#modallayanan">
                        Izin Praktik Dokter
                    </button>
                </div>
            </div>
        </div>
    </div>


    <section class="wpo-blog-highlights-section section-padding">
        <div class="container">
            
            <div class="row">
                <div class="col col-lg-9 col-12">
                    <div class="mb-5">
                        <div class="wpo-section-title">
                            <h2>Berita Terkini</h2>
                        </div>
                        <!-- start wpo-blog-section -->
                        <div class="wpo-blog-highlights-wrap">
                            <div class="wpo-blog-items">
                                <div class="row">
                                    @foreach ($Berita as $Beritas)
                                        <div class="col col-lg-6 col-md-6 col-12">
                                            <div class="wpo-blog-item">
                                                <div class="wpo-blog-img">
                                                    <img src="{{ asset($Beritas->gambar) }}" alt="">
                                                </div>
                                                <div class="wpo-blog-content">
                                                    <h2>
                                                        <a
                                                            href="{{ route('detail-berita', $Beritas->slug) }}">{{ \Illuminate\Support\Str::limit($Beritas->judul, $limit = 60, $end = '...') }}</a>
                                                    </h2>
                                                    <ul>
                                                        <li><img src="tlandingpage/assets/images/blog/blog-avater/img-1.jpg "
                                                                alt="">
                                                        </li>
                                                        <li>By <a href="#">{{ $Beritas->User->name }}</a>
                                                        </li>
                                                        <li>{{ $Beritas->created_at->Format('D, d M Y') }}</li>
                                                    </ul>
                                                    <p>{!! \Illuminate\Support\Str::limit($Beritas->isi, $limit = 120, $end = '...') !!} </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="text-center">
                                        <a href="{{ route('landingpage-berita') }}" class="theme-btn">Berita
                                            Lainnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <div class="wpo-section-title">
                            <h2>Jadwal Pelayanan</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg col-12">
                                <img src="{{asset($getProfileWebsite->gambar_pelayanan??null)}}" alt="" width="100%"
                                    height="300px" style="object-fit: cover; border-radius: 1rem; overflow: hidden;">
                            </div>
                            <div class="col-lg-5 col-12">
                                <h5 class="fw-bolder">DPMPTSP Kota Balikpapan</h5>
                                <h3 class="fw-bolder mb-3">{{$getProfileWebsite->slogan_pelayanan??null}}</h3>
                                <p>{{$getProfileWebsite->deskripsi_pelayanan??null}}</p>
                                <ul class="jadwal-pelayanan">
                                    <li>
                                        <h5 class="fw-bolder text-secondary">Senin - Kamis</h5>
                                        <p>{{$getProfileWebsite->senin_kamis??null}}</p>
                                    </li>
                                    <li>
                                        <h5 class="fw-bolder text-secondary">Jum'at</h5>
                                        <p>{{$getProfileWebsite->jumat}}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end wpo-blog-section -->
                </div>
                <div class="col col-lg-3 col-12">
                    <div class="blog-sidebar">
                        <div class="widget about-widget">
                            <div class="img-holder">
                                <img src="{{ asset($getProfileWebsite->foto_kadis) }}" height="200px"
                                    style="object-fit: cover;">
                            </div>
                            <h4>{{ $getProfileWebsite->nama_kadis }}</h4>
                            <p>Kepala Dinas DPMPTSP Balikpapan</p>
                            <div class="social">
                                <ul class="clearfix">
                                    {{-- <li><a href="#"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#"><i class="ti-linkedin"></i></a></li> --}}
                                </ul>
                            </div>
                            <div class="aw-shape">
                                <img src="assets/images/blog/ab.png" alt="">
                            </div>
                        </div>
                        <div class="widget recent-post-widget">
                            <h3>Berita Populer</h3>
                            <div class="posts">
                                @foreach ($Populer as $item)
                                    <div class="post">
                                        <div class="img-holder">
                                            <img src="{{ asset($item->gambar) }}" alt>
                                        </div>
                                        <div class="details">
                                            <span class="date">{{ $item->created_at->Format('D, d M Y') }} </span>
                                            <h4 class="fs-6"><a
                                                    href="{{ route('detail-berita', $item->slug) }}">{{ $item->judul }}</a>
                                            </h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @foreach ($FastLink as $item)
                            <div class="wpo-add-widget mb-4">
                                <a href="{{$item->link}}"><img
                                        src="{{asset($item->logo)}}"
                                        alt="" width="100%" height="100%"></a>
                            </div>
                        @endforeach
                        <div class="wpo-contact-widget widget">
                            <h2>Survey Kepuasan Masyarakat</h2>
                            <p>Yuk bantu kami dalam meningkatkan kualitas pelayanan</p>
                            <a href="contact.html">Survey</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <br>
</x-guest-layout>
