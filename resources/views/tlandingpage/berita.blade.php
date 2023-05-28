<x-guest-layout>
    <!-- start of breadcumb-section -->
    <div class="wpo-breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wpo-breadcumb-wrap">
                        <h2>Berita</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Berita</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of wpo-breadcumb-section-->


    <!-- start wpo-blog-pg-section -->
    <section class="wpo-blog-pg-section blog-pg-left-sidebar section-padding">
        <div class="container">
            <div class="row">

                <div class="col col-lg-8 order-lg-2">
                    <div class="wpo-blog-content">
                        @foreach ($Berita as $item)
                            <div class="post format-standard-image mb-5">
                                <div class="entry-media">
                                    <img src="{{ asset($item->gambar) }}" alt>
                                </div>
                                <div class="entry-meta">
                                    <ul>
                                        <li><i class="fi flaticon-user"></i> By <a
                                                href="#">{{ $item->User->name }}</a> </li>
                                        <li><i class="fi flaticon-calendar"></i>
                                            {{ $item->created_at->Format('D, d M Y') }}</li>
                                    </ul>
                                </div>
                                <div class="entry-details">
                                    <h3><a href="{{ route('detail-berita', $item->slug) }}">{{  \Illuminate\Support\Str::limit($item->judul, $limit = 90, $end = '...') }}</a></h3>
                                    {!! \Illuminate\Support\Str::limit($item->isi, $limit = 200, $end = '...') !!}
                                    <br>
                                    <br><a href="#" class="read-more">READ MORE</a>
                                </div>
                            </div>
                        @endforeach

                        {{-- <div class="pagination-wrapper pagination-wrapper-left">
                            <ul class="pg-pagination">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <i class="fi ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <i class="fi ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div> --}}

                        {!! $Berita->links() !!}
                    </div>
                </div>
                <div class="col col-lg-4 order-lg-1 col-12">
                    <div class="blog-sidebar">
                        <div class="widget search-widget">
                            <form action="{{route('cari-berita')}}" method="post">
                                @csrf
                                @method("POST")
                                <div>
                                    <input type="text" name="berita" class="form-control" placeholder="Cari Berita">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="widget recent-post-widget">
                            <h3>Berita Populer</h3>
                            <div class="posts">
                                @foreach ($Populer as $item)
                                    <div class="post">
                                        <div class="img-holder">
                                            <img src="{{ asset($item->gambar) }}"
                                                alt>
                                        </div>
                                        <div class="details">
                                            <span class="date">{{$item->created_at->Format('D, d M Y')}} </span>
                                            <h4 class="fs-6"><a href="{{route('detail-berita',$item->slug)}}">{{$item->judul}}</a></h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
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
    <!-- end wpo-blog-pg-section -->
</x-guest-layout>
