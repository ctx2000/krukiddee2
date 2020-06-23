@extends('layouts.user.master')

@push('title')
Krukidee
@endpush

@push('plugin-styles')
<!-- Plugin css import here -->

@endpush

@section('content')
<!-- Page content here -->
<!-- start of hero -->
{{-- <section class="hero hero-style-3"> --}}
<section class="section">
    <div class="container">
        <div class="row bottom-50">
            <div class="col-12">

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form member-form" action="javascript:void(0);">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h3 class="donation-details__title bottom-50 no-margin-top"><strong>เข้าสู่ระบบ</strong>AA Details</h3>
                        </div>
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                            <input class="form__field" type="text" name="last-name" placeholder="Last Name"/>
                        </div>
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-6">
                            <input class="form__field" type="text" name="last-name" placeholder="Last Name"/>
                        </div>
                        <div class="col-md-3">
                            <input class="form__field" type="hidden"/>
                        </div>
                        <div class="col-md-3">

                        </div>
                        <div class="col-6 text-center">
                            <button class="btn form__submit " type="submit">เข้าสู่ระบบ</button>
                        </div>
                        <div class="col-md-3">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- end of hero slider -->
<!-- end of hero slider -->

@endsection

@push('plugin-scripts')
<!-- Plugin js import here -->
@endpush

@push('custom-scripts')
<!-- Custom js here -->
@endpush
