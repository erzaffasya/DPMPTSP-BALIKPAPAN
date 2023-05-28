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
                                            <div class="slide-inner slide-bg-image"
                                                data-background="{{ asset($Banners->gambar) }}">
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
                                                <h2><a href="{{ route('detail-berita', $item->id) }}">{{ \Illuminate\Support\Str::limit($item->judul, $limit = 55, $end = '...') }}
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
                                            <h2><a href="{{ route('detail-berita', $item->id) }}">{{ \Illuminate\Support\Str::limit($item->judul, $limit = 25, $end = '...') }}
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

    <div class="wpo-breacking-news section-padding">
        <div class="container">
            <div class="row">
                <div class="b-title"><span>Pelayanan Kami</span></div>
                <div class="wpo-breacking-wrap owl-carousel">
                    @foreach ($Pelayanan as $item)
                        <div class="wpo-breacking-item s1">
                            <div class="wpo-breacking-img">
                                <img src="{{ asset($item->gambar) }}" alt="">
                            </div>
                            <div class="wpo-breacking-text">
                                <h3 class="fw-bolder">{{ $item->judul }}</h3>
                                <p>{!! $item->deskripsi !!}</a>
                                </p>
                            </div>
                        </div>
                    @endforeach
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
                                                            href="{{ route('detail-berita', $Beritas->id) }}">{{ \Illuminate\Support\Str::limit($Beritas->judul, $limit = 60, $end = '...') }}</a>
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
                                                    href="{{ route('detail-berita', $item->id) }}">{{ $item->judul }}</a>
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
