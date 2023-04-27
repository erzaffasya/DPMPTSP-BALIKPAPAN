<x-app-layout>
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Congratulations {{ Auth::user()->name }}! 🎉</h5>
                            <p class="mb-4">
                                Anda telah berhasil login sebagai <span class="fw-bold">{{ Auth::user()->role }}.</span>
                            </p>

                            {{-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> --}}
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="tadmin/assets/img/illustrations/man-with-laptop-light.png" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8 col-lg-12 order-3 order-md-2">
            <div class="row">
                <div class="col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="tadmin/assets/img/icons/unicons/cc-primary.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                        <a class="dropdown-item" href="{{route('Menu.index')}}">View More</a>
                                        {{-- <a class="dropdown-item" href="javascript:void(0);">Delete</a> --}}
                                    </div>
                                </div>
                            </div>
                            <span class="d-block mb-1">Menu</span>
                            <h3 class="card-title text-nowrap mb-2">{{ $Menu->where('parent_id',null)->count() }}</h3>
                            {{-- <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i>
                              -14.82%</small> --}}
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="tadmin/assets/img/icons/unicons/cc-primary.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                                {{-- <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                        <a class="dropdown-item" href="{{route('HalamanMenu.index')}}">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div> --}}
                            </div>
                            <span class="d-block mb-1">Sub Menu</span>
                            <h3 class="card-title text-nowrap mb-2">{{ $Menu->where('parent_id','!=',null)->count() }}</h3>
                            {{-- <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i>
                              -14.82%</small> --}}
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="tadmin/assets/img/icons/unicons/cc-primary.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                                {{-- <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div> --}}
                            </div>
                            <span class="d-block mb-1">User</span>
                            <h3 class="card-title text-nowrap mb-2">{{ $User->count() }}</h3>
                            {{-- <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i>
                            -14.82%</small> --}}
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="tadmin/assets/img/icons/unicons/cc-primary.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                        <a class="dropdown-item" href="{{route('Banner.index')}}">View More</a>
                                        {{-- <a class="dropdown-item" href="javascript:void(0);">Delete</a> --}}
                                    </div>
                                </div>
                            </div>
                            <span class="d-block mb-1">Banner</span>
                            <h3 class="card-title text-nowrap mb-2">{{ $Banner->count() }}</h3>
                            {{-- <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i>
                              -14.82%</small> --}}
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="tadmin/assets/img/icons/unicons/cc-primary.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                        <a class="dropdown-item" href="{{route('Pengumuman.index')}}">View More</a>
                                        {{-- <a class="dropdown-item" href="javascript:void(0);">Delete</a> --}}
                                    </div>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Pengumuman</span>
                            <h3 class="card-title mb-2">{{ $Pengumuman->count() }}</h3>
                            {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small> --}}
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="tadmin/assets/img/icons/unicons/cc-primary.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                        <a class="dropdown-item" href="{{route('Berita.index')}}">View More</a>
                                        {{-- <a class="dropdown-item" href="javascript:void(0);">Delete</a> --}}
                                    </div>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Berita</span>
                            <h3 class="card-title mb-2">{{ $Berita->count() }}</h3>
                            {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <!-- Vendors JS -->
        <script src="{{ asset('tadmin/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

        <!-- Page JS -->
        <script src="{{ asset('tadmin/assets/js/dashboards-analytics.js') }}"></script>
    @endpush
</x-app-layout>
