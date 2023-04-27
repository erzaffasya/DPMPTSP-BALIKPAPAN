        <nav class="navigation navbar navbar-expand-lg navbar-light">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-3 col-md-3 col-3 d-lg-none dl-block">
                        <div class="mobail-menu">
                            <button type="button" class="navbar-toggler open-btn">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar first-angle"></span>
                                <span class="icon-bar middle-angle"></span>
                                <span class="icon-bar last-angle"></span>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6 my-4">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset($getProfileWebsite->logo)}}" alt="" width="100%"></a>
                                    {{-- {{asset("tlandingpage/assets/css/owl.carousel.css")}} --}}
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-6">
                        <p class="fs-6">
                            Visi: <br>
                            <span class="fw-bold">{{$getProfileWebsite->visi}}</span>
                        </p>
                    </div>
                    <div class="col-lg-1 col-md-1 col-1">
                        <div class="header-right">
                            <div class="header-search-form-wrapper">
                                <div class="cart-search-contact">
                                    <button class="search-toggle-btn"><i class="fi flaticon-magnifiying-glass"></i></button>
                                    <div class="header-search-form">
                                        <form action="{{route('cari-berita')}}" method="post">
                                            @csrf
                                            @method("POST")
                                            <div>
                                                <input type="text" name="berita" class="form-control" placeholder="Search here...">
                                                <button type="submit"><i class="fi flaticon-magnifiying-glass"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-1 col-1 my-3">
                        <div id="navbar" class="collapse navbar-collapse navigation-holder">
                            <button class="menu-close"><i class="ti-close"></i></button>
                            <ul class="nav navbar-nav mb-2 mb-lg-0">
                                <li><a href="{{route('home')}}">Home</a></li>

                                @foreach ($Menu->sortBy('urutan') as $item)
                                    <x-menu-item :menu="$item" />                            
                                @endforeach
                                <li><a href="{{route('landingpage-berita')}}">Berita</a></li>
                                <li><a href="{{route('kontak')}}">Kontak</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- end of container -->
        </nav>
