<x-guest-layout>
     <!-- start of breadcumb-section -->
        <div class="wpo-breadcumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>Kontak</h2>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><span>kontak</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of wpo-breadcumb-section-->

        <!-- start wpo-contact-pg-section -->
        <section class="wpo-contact-pg-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-10 offset-lg-1">
                        <div class="office-info">
                            <div class="row">
                                <div class="col-7">
                                    <div class="wpo-contact-map-section">
                                        <div class="wpo-contact-map">
                                            <iframe src="{{$getProfileWebsite->google_maps}}"\></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="mb-4">
                                        <div class="office-info-item">
                                            <div class="text-left">
                                                <h3 class="mb-1">Alamat</h3>
                                                <p class="mb-0">{{$getProfileWebsite->alamat}}</p>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="mb-4">
                                        <div class="office-info-item">
                                            <div class="office-info-text">
                                                <h3 class="mb-1">Email Pelayanan</h3>
                                                <p class="mb-0">{{$getProfileWebsite->email}}</p>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="mb-4">
                                        <div class="office-info-item">
                                            <div class="office-info-text">
                                                <h3 class="mb-1">Telepon / Whatsapp</h3>
                                                <p class="mb-0">{{$getProfileWebsite->no_telp}}</p>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end wpo-contact-pg-section -->

        <!--  start wpo-contact-map -->
        
        <!-- end wpo-contact-map -->
</x-guest-layout>
