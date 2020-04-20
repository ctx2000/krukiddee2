@extends('layouts.user.master')

@push('title')
  Krukidee
@endpush

@push('plugin-styles')
  <!-- Plugin css import here -->
@endpush

@section('content')
<!-- Page content here -->
<!-- promo start-->
<section class="promo-primary">
  <picture>
    <source srcset="{{asset('user/img/contacts.jpg')}}" media="(min-width: 992px)"/><img class="img--bg" src="{{asset('user/img/contacts.jpg')}}" alt="img"/>
  </picture>
  <div class="container">
    <div class="row">
      <div class="col-auto">
        <div class="align-container">
          <div class="align-container__item"><span class="promo-primary__pre-title">Wild World</span>
            <h1 class="promo-primary__title"><span>Our</span> <span>Contacts</span></h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- promo end-->
<!-- section start-->
<section class="section">
  <div class="container">
    <div class="row bottom-50">
      <div class="col-12">
        <div class="heading heading--primary heading--center">
          <h2 class="heading__title no-margin-bottom"><span>Get in touch</span> <span>with us</span></h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
        <form class="form" id="ajax-form" action="javascript:void(0);" method="post">
          <div class="row">
            <div class="col-md-6">
              <input class="form__field" type="text" name="name" placeholder="Your Name"/>
            </div>
            <div class="col-md-6">
              <input class="form__field" type="email" name="email" placeholder="Your Email"/>
            </div>
            <div class="col-md-6">
              <input class="form__field" type="tel" name="phone" placeholder="Your Phone"/>
            </div>
            <div class="col-md-6">
              <input class="form__field" type="text" name="subject" placeholder="Subject"/>
            </div>
            <div class="col-12">
              <textarea class="form__field form__message" name="message" placeholder="Text"></textarea>
            </div>
            <div class="col-12 text-center">
              <input class="form__submit" type="submit" value="Send"/>
            </div>
            <div class="col-12">
              <div class="alert alert--success alert--filled">
                <div class="alert__icon">
                  <svg class="icon">
                    <use xlink:href="#check"></use>
                  </svg>
                </div>
                <p class="alert__text"><strong>Well done!</strong> Your form has been sent</p><span class="alert__close">
                  <svg class="icon">
                    <use xlink:href="#close"></use>
                  </svg></span>
              </div>
              <div class="alert alert--error alert--filled">
                <div class="alert__icon">
                  <svg class="icon">
                    <use xlink:href="#close"></use>
                  </svg>
                </div>
                <p class="alert__text"><strong>Oh snap!</strong> Your form has not been sent</p><span class="alert__close">
                  <svg class="icon">
                    <use xlink:href="#close"></use>
                  </svg></span>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- section end-->
<!-- section start-->
<section class="map-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-5 col-xl-4">
        <div class="contacts-banner">
          <p>
            <svg class="icon">
              <use xlink:href="#map-pin"></use>
            </svg> av. Washington 165, NY CA 54003
          </p>
          <p>
            <svg class="icon">
              <use xlink:href="#phone-call"></use>
            </svg> <a href="tel:+31859644725">+31 85 964 47 25</a> <a href="tel:31859644725">+31 65 792 63 11</a>
          </p>
          <p>
            <svg class="icon">
              <use xlink:href="#mail"></use>
            </svg> <a href="mailto:info@animalsworld.com">info@animalsworld.com</a>
          </p>
          <p>
            <svg class="icon">
              <use xlink:href="#clock"></use>
            </svg> 9:00 AM - 5:00 PM
          </p>
        </div>
      </div>
    </div>
  </div>
  <div id="map" data-api-key="AIzaSyD5ES8GFHrarPhIVpDhFDea6fPtga0Wy4Y" data-longitude="-73.935242" data-latitude="40.730610" data-marker="{{asset('user/img/placeholder.png')}}"></div>
</section>
<!-- section end-->
@endsection

@push('plugin-scripts')
  <!-- Plugin js import here -->
@endpush

@push('custom-scripts')
  <!-- Custom js here -->
@endpush
