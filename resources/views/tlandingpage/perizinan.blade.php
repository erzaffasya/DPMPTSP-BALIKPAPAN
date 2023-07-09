<x-guest-layout>
    @foreach ($dataPerizinan as $item)
        <div class="modal fade" id="modal-layanan-{{ $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="section-title text-center mb-0 pb-2">
                            <p class="text-danger text-uppercase fw-bold mb-0 fs-6">Layanan Perizinan</p>
                            <h4 class="fs-2">{{ $item['perizinan'] }}</h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                Dasar Hukum
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                {!! $item['data']['dasar_hukum'] !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                Persyaratan
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                {!! $item['data']['persyaratan'] !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                Masa Berlaku
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                {!! $item['data']['masa_berlaku'] !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                aria-expanded="false" aria-controls="collapseFour">
                                                Waktu Proses Penerbitan Izin
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                {!! $item['data']['waktu_proses'] !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                aria-expanded="false" aria-controls="collapseFive">
                                                Proses Penerbitan Izin
                                            </button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                {!! $item['data']['proses_penerbitan'] !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                                aria-expanded="false" aria-controls="collapseSix">
                                                Biaya / Retribusi
                                            </button>
                                        </h2>
                                        <div id="collapseSix" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                {!! $item['data']['biaya_retribusi'] !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn w-100 bg-white text-danger"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="wpo-breacking-news section-padding">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="text-danger mb-0 pb-0 fw-bold fs-1">Layanan Perizinan DPMPTSP</h2>
                <p class="text-dark my-0 fs-5">Informasi Standar Pelayanan Perizinan</p>
            </div>
            <div class="row justify-content-center">
                {{-- <div class="col-4">
                    <form action="" method="post">
                        @csrf
                        @method('POST')
                        <div>
                            <input type="text" name="berita" class="form-control" placeholder="Search here...">
                        </div>
                    </form>
                </div> --}}
                <div class="col-12 mb-4">
                </div>
                @foreach ($Perizinan as $item)
                    <div class="col-lg-3 col-md-4 col-sm-10 mb-4">
                        <button type="button"
                            class="btn btn-light border w-100 h-100 fw-bold text-dark shadow-lg py-3 btn-layanan"
                            data-bs-toggle="modal" data-bs-target="#modal-layanan-{{ $item->id }}">
                            {{ $item->perizinan }}
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-guest-layout>
