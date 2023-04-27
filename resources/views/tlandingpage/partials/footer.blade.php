<footer class="wpo-site-footer">
    <div class="wpo-upper-footer">
        <div class="container">
            <div class="row">
                <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="widget about-widget">
                        <div class="logo widget-title">
                            <img src="{{asset($getProfileWebsite->logo)}}" alt="blog" height="85">
                        </div>
                        <h3 class="text-white fw-bold">{{$getProfileWebsite->slogan}}</h3 class="text-white fw-bold">

                    </div>
                </div>
                <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="widget link-widget">
                        <div class="widget-title">
                            <h3>Link Terkait</h3>
                        </div>
                        <ul>
                            @foreach ($getLinkTerkait as $item)
                            <li><a target="_blank" href="{{$item->link}}">{{$item->judul}}</a></li>                                
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col col-lg-2 col-md-6 col-sm-12 col-12">
                    <div class="widget social-widget">
                        <div class="widget-title">
                            <h3>Media Sosial</h3>
                        </div>
                        <ul>
                            <li><a target="_blank" href="{{$getProfileWebsite->facebook}}"><i><img src="{{asset('tlandingpage/assets/images//ft-icon/1.png')}}"
                                            alt=""></i> Facebook</a>
                            </li>
                            <li><a target="_blank" href="{{$getProfileWebsite->instagram}}"><i><img src="{{asset('tlandingpage/assets/images//ft-icon/3.png')}}"
                                            alt=""></i> Instagram</a>
                            </li>
                            <li><a target="_blank"href="{{$getProfileWebsite->youtube}}"><i><img src="{{asset('tlandingpage/assets/images//ft-icon/4.png')}}"
                                            alt=""></i> Youtube</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="widget tag-widget">
                        <div class="widget-title">
                            <h3>Alamat</h3>
                        </div>
                        <ul>
                            <li>
                                <a href="/kontak">
                                    <p>{{$getProfileWebsite->alamat}}</p>
                                    <span class="post-control-link">Kontak Kami</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </div>
    <div class="wpo-lower-footer">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <p class="copyright"> Copyright &copy; 2022 DPMPTSP Mahakam Ulu</p>
                </div>
            </div>
        </div>
    </div>
</footer>