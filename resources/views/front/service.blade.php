@extends('frontLayouts.main')
@section('title', 'Services - repair')
@section('content')


    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Services</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Service</li>
                </ol>
            </nav>
        </div>
    </div>


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                @foreach($services as $index => $service)
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.{{ ($index * 2) + 1 }}s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="{{$service->service_icon}} text-primary mb-4"></i>
                                <h5>{{$service->heading}}</h5>
                                <p>{{$service->title}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
    <!-- Service End -->

@endsection
