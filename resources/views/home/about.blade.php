<x-home-master>
    @section('content')
        <!-- Hero Start -->
        <div class="container-fluid bg-primary py-5 bg-hero mb-5">
            <div class="container py-5">
                <div class="row justify-content-start">
                    <div class="col-lg-8 text-center text-lg-start">
                        <h1 class="display-1 text-white mb-md-4">About Us</h1>
                        <a href="" class="btn btn-primary py-md-3 px-md-5 me-3">Home</a>
                        <a href="" class="btn btn-secondary py-md-3 px-md-5">About Us</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!-- About Start -->
        <div class="container-fluid about pt-5">
            <div class="container">
                <div class="row gx-5">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="d-flex h-100 border border-5 border-primary border-bottom-0 pt-4">
                            <img class="img-fluid mt-auto mx-auto" src="{{ asset('/home_ui/img/about.png') }}">
                        </div>
                    </div>
                    <div class="col-lg-6 pb-5">
                        <div class="mb-3 pb-2">
                            <h6 class="text-primary text-uppercase">About Us</h6>
                            <h1 class="display-5">We Produce Organic Food For Your Family</h1>
                        </div>
                        <p class="mb-4">Tempor erat elitr at rebum at at clita. Diam dolor diam ipsum et tempor sit. Clita
                            erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor
                            eirmod magna dolore erat amet magna</p>
                        <div class="row gx-5 gy-4">
                            <div class="col-sm-6">
                                <i class="fa fa-seedling display-1 text-secondary"></i>
                                <h4>100% Organic</h4>
                                <p class="mb-0">Labore justo vero ipsum sit clita erat lorem magna clita nonumy dolor
                                    magna dolor vero</p>
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-award display-1 text-secondary"></i>
                                <h4>Award Winning</h4>
                                <p class="mb-0">Labore justo vero ipsum sit clita erat lorem magna clita nonumy dolor
                                    magna dolor vero</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
    @endsection
</x-home-master>
