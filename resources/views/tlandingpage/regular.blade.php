<x-guest-layout>
    <section class="wpo-blog-single-section mt-4 mb-5">
        <div class="container">
            <div class="row">
                <div class="col col-lg-8 col-12">
                    <h2 class="fw-bolder mb-3">{{ $HalamanMenu->judul ?? null }}</h2>
                    <p>
                        @if ($HalamanMenu->gambar ?? null)
                            <img src="{{ asset($HalamanMenu->gambar) }}" width="100%" style="object-fit: contain; object-position: top;">
                        @endif
                        @if ($HalamanMenu->isi ?? null)
                            {!! $HalamanMenu->isi !!}
                        @endif
                        @if ($HalamanMenu->file ?? null)
                            <iframe height="800" src="{{ asset($HalamanMenu->file) }}" width="100%"></iframe>
                        @endif
                        @if ($HalamanMenu->link ?? null)
                        <br>
                        {{-- <h3>Link</h3> --}}
                        Link : <a href="{{$HalamanMenu->link}}">Klik Disini!!</a>
                        @endif
                    </p>
                </div>
                <div class="col col-lg-4 col-12">
                    <div class="blog-sidebar">
                        <div class="widget recent-post-widget">
                            <h3>Berita Terbaru</h3>
                            <div class="posts">
                                @foreach ($BeritaBaru as $item)
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
                        <div class="widget recent-post-widget">
                            <h3>Berita Populer</h3>
                            <div class="posts">
                                @foreach ($Populer as $item)
                                    <div class="post">
                                        <div class="img-holder">
                                            <img src="{{ asset($item->gambar) }}" alt>
                                        </div>
                                        <div class="details">
                                            <span class="date">{{ $item->created_at->Format('D, d M Y') }}
                                            </span>
                                            <h4 class="fs-6"><a
                                                    href="{{ route('detail-berita', $item->id) }}">{{ $item->judul }}</a>
                                            </h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
</x-guest-layout>
