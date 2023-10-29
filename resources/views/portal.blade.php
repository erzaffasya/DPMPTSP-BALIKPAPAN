<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PORTAL DPMPTSP KOTA BALIKPAPAN</title>
    <!-- <link rel="stylesheet" href="assets/css/bulma.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.4/css/bulma.css" integrity="sha512-SI0aF82pT58nyOjCNfyeE2Y5/KHId8cLIX/1VYzdjTRs0HPNswsJR+aLQYSWpb88GDJieAgR4g1XWZvUROQv1A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"
        integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('tportal/assets/css/design.css') }}">
    <style>
        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    @if ($BannerPortal != null && $BannerPortal->isActive)
        <div class="modal fade" id="headlineModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-body position-relative">
                        <div class="position-absolute float-end bg-white p-2 rounded"
                            style="top: 0.5rem!important; right: 0.5rem!important;">
                            <button type="button" class="btn-close mb-0 fw-bold" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        @if ($BannerPortal->youtube != null)
                            <div class="video-container mb-3">
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$BannerPortal->youtube}}?autoplay=1&mute=1&loop=1" frameborder="0" allowfullscreen></iframe>
                            </div>
                        @endif
                        <figure class="mb-0">

                            @if ($BannerPortal->gambar != null)
                                <img src="{{ $BannerPortal->gambar }}" class="mb-1" alt="" width="100%"
                                    style="max-height: 300px; min-height: 250px; object-fit: contain; background: rgb(228, 239, 253);">
                            @endif

                            @if ($BannerPortal->deskripsi != null)
                                <p class="mb-2" style="text-align: justify;">
                                    {!! $BannerPortal->deskripsi !!}
                                </p>
                            @endif
                            @if ($BannerPortal->link != null)
                                <a target="_blank" href="{{ $BannerPortal->link }}"
                                    class="btn btn-primary btn-sm py-2 px-3 rounded mt-2">Link</a>
                            @endif
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div id="wrap-bg">

        <input type="checkbox" id="switch" class="check">
        <label for="switch"></label>
        <div id="bgschool">
            <div class="wrap-cloud">
                <div class="cloud">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="cloud">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="cloud">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="sun-moon"></div>
                <div id="stars"></div>
            </div>

        </div>
    </div>

    <div id="container">

        <div class="content text-center">
            <h1 class="title-top fw-bold text-light">Selamat datang di
                <span class="">DPMPTSP Kota
                    Balikpapan</span>
            </h1>
            <div id="kontak-btn" class="d-grid gap-2 d-md-block">
                <a href="{{ route('kontak') }}" class="btn btn-warning btn-lg me-2">
                    <span class="me-2"> Kontak Kami</span>
                    <i class="fa-solid fa-phone"></i></a>
                <a href="{{ route('home') }}" class="btn btn-danger btn-lg">
                    <span class="me-2"> Masuk Website</span>
                    <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
        <div id="box-link" class="row mx-0 w-100 gy-3">
            @foreach ($Portal as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 col-10 mt-0 mb-3">
                    <a target="_blank" href="{{ $item->link }}" style="text-decoration: none!important;">
                        <div class="card w-100 h-100">
                            <div class="row g-0 h-100" style="align-items: center;">
                                <div class="col-4">
                                    <img src="{{ asset($item->gambar) }}" class="img-fluid rounded-start h-100">
                                </div>
                                <div class="col-8">
                                    <div class="card-body">
                                        <h5 class="card-title text-dark text-uppercase fw-bold">{{ $item->judul }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#headlineModal').modal('show');
        // $("#myModal").modal('show');
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"
    integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
    integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>
