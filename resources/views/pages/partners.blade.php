@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <h2 class="text-center" style="font-weight: bold;font-family: sans-serif;"> Our Partners </h2>
            </div>
        </div>
    </div>
    <section id="team" class="team section-bg">
        <div class="container mt-2" data-aos="fade-up">
            <div class="row">
                <div class="col-md-12" data-wow-delay="0.1s">
                    <div class="member" data-aos="zoom-in" data-aos-delay="100">
                        <img src="{{ (isset($settings["partner_1"]->value))?asset('img/'.$settings["partner_1"]->value):asset("img/dummy.jpg") }}" height="150px" width="100%" class="" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Walter White</h4>
                                <span>Chief Executive Officer</span>
                            </div>
                            <div class="social">
                                <a href=""><i class="icofont-twitter"></i></a>
                                <a href=""><i class="icofont-facebook"></i></a>
                                <a href=""><i class="icofont-instagram"></i></a>
                                <a href=""><i class="icofont-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12" data-wow-delay="0.1s">
                    <div class="member" data-aos="zoom-in" data-aos-delay="200">
                        <img src="{{ (isset($settings["partner_2"]->value))?asset('img/'.$settings["partner_2"]->value):asset("img/dummy.jpg") }}" height="150px" width="100%" class="" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Sarah Jhonson</h4>
                                <span>Product Manager</span>
                            </div>
                            <div class="social">
                                <a href=""><i class="icofont-twitter"></i></a>
                                <a href=""><i class="icofont-facebook"></i></a>
                                <a href=""><i class="icofont-instagram"></i></a>
                                <a href=""><i class="icofont-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12" data-wow-delay="0.1s">
                    <div class="member" data-aos="zoom-in" data-aos-delay="200">
                        <img src="{{ (isset($settings["partner_3"]->value))?asset('img/'.$settings["partner_3"]->value):asset("img/dummy.jpg") }}" height="150px" width="100%" class="" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Sarah Jhonson</h4>
                                <span>Product Manager</span>
                            </div>
                            <div class="social">
                                <a href=""><i class="icofont-twitter"></i></a>
                                <a href=""><i class="icofont-facebook"></i></a>
                                <a href=""><i class="icofont-instagram"></i></a>
                                <a href=""><i class="icofont-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Team Section -->

@endsection
