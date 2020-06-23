@extends('layouts.user.master')

@push('title')
Krukidee
@endpush

@push('plugin-styles')
<!-- Plugin css import here -->

@endpush

@section('content')
<section class="promo-primary">
    <picture>
        <source srcset="img/donation.jpg" media="(min-width: 992px)" /><img class="img--bg" src="img/donation.jpg"
            alt="img" />
    </picture>
    <div class="container">
        <div class="row">
            <div class="col-auto">
                <div class="align-container">
                    <div class="align-container__item"><span class="promo-primary__pre-title">Wild World</span>
                        <h1 class="promo-primary__title"><span>Donate to</span> <span>zoo</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="row offset-70">
            <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                <div class="donation-item">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="donation-item__img"><img class="img--bg" src="img/donation_1.jpg" alt="img"/></div>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="donation-item__title"><a href="#">SAFE: Saving Animals From Extinction</a></h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto fugiat voluptatum labore suscipit saepe ipsa repudiandae vel beatae vitae at, officia veritatis nobis exercitationem dolores cum magnam velit autem. Aperiam dolor facilis impedit illo voluptates reprehenderit natus eius eligendi enim. Aperiam dolor facilis impedit illo voluptates.</p><a class="button button--primary" href="#">Donate now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                <div class="donation-item">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="donation-item__img"><img class="img--bg" src="img/donation_2.jpg" alt="img"/></div>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="donation-item__title"><a href="#">Conservation Grants Fund (CGF)</a></h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto fugiat voluptatum labore suscipit saepe ipsa repudiandae vel beatae vitae at, officia veritatis nobis exercitationem dolores cum magnam velit autem. Aperiam dolor facilis impedit illo voluptates reprehenderit natus eius eligendi enim. Aperiam dolor facilis impedit illo voluptates.</p><a class="button button--primary" href="#">Donate now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                <div class="donation-item">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="donation-item__img"><img class="img--bg" src="img/donation_3.jpg" alt="img"/></div>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="donation-item__title"><a href="#">Employee Relief Fund (GFSD)</a></h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto fugiat voluptatum labore suscipit saepe ipsa repudiandae vel beatae vitae at, officia veritatis nobis exercitationem dolores cum magnam velit autem. Aperiam dolor facilis impedit illo voluptates reprehenderit natus eius eligendi enim. Aperiam dolor facilis impedit illo voluptates.</p><a class="button button--primary" href="#">Donate now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('plugin-scripts')
<!-- Plugin js import here -->
@endpush

@push('custom-scripts')
<!-- Custom js here -->
@endpush
