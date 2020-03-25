@extends('layouts.memberNav')

@section('content')
<section class="hero hero-style-3">
    <div class="hero-slider">
        <div class="slide">
            <div class="container">
                <img src="assets/images/slider/slide-4.jpg" alt class="slider-bg">
                <div class="row">
                    <div class="col col-md-6 slide-caption">
                        <div class="slide-title">
                            <h2>Let’s be Kind for <span>Children</span></h2>
                        </div>
                        <div class="slide-subtitle">
                            <p>High Quality Charity Theme in Envato Market.</p>
                            <p>You Can Satisfied Yourself By Helping.</p>
                        </div>
                        <div class="btns">
                            <a href="causes-single.php" class="theme-btn">Donate Now</a>
                            <a href="causes.php" class="theme-btn-s2">Know More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide">
            <div class="container">
                <img src="assets/images/slider/slide-3.jpg" alt class="slider-bg">
                <div class="row">
                    <div class="col col-md-6 slide-caption">
                        <div class="slide-title">
                            <h2>Let’s be Kind for <span>Children</span></h2>
                        </div>
                        <div class="slide-subtitle">
                            <p>High Quality Charity Theme in Envato Market.</p>
                            <p>You Can Satisfied Yourself By Helping.</p>
                        </div>
                        <div class="btns">
                            <a href="causes-single.php" class="theme-btn">Donate Now</a>
                            <a href="causes.php" class="theme-btn-s2">Know More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide">
            <div class="container">
                <img src="assets/images/slider/slide-1.jpg" alt class="slider-bg">
                <div class="row">
                    <div class="col col-md-6 slide-caption">
                        <div class="slide-title">
                            <h2>Let’s be Kind for <span>Children</span></h2>
                        </div>
                        <div class="slide-subtitle">
                            <p>High Quality Charity Theme in Envato Market.</p>
                            <p>You Can Satisfied Yourself By Helping.</p>
                        </div>
                        <div class="btns">
                            <a href="causes-single.php" class="theme-btn">Donate Now</a>
                            <a href="causes.php" class="theme-btn-s2">Know More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- wpo-case-area start -->
<div class="wpo-case-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wpo-section-title">
                    <span>ผู้ต้องการได้รับบริจาค</span>
                    <h2>ผู้ต้องการได้รับบริจาคเร่งด่วน</h2>
                </div>
            </div>
        </div>
        <div class="wpo-case-wrap">
            <div class="wpo-case-slider">
                @foreach ($max as $m)


                <div class="wpo-case-single">
                    <div class="wpo-case-item">
                        <div class="wpo-case-img">
                            <img src="{{asset('storage/images/'.$m->picture)}}"style="  width: 100%;  max-height: 190px; height: auto;"alt="">
                        </div>
                        <div class="wpo-case-content">
                            <div class="wpo-case-text-top">
                                <h2>{{$m->name.' '.$m->lastname}}</h2>
                                <div class="progress-section">
                                    <div class="process">
                                        <div class="progress">
                                            <?php
                                            $id =[
                                                'id' =>$m->id,
                                            ];
                                            $id= Crypt::encrypt($id);
                                            $per = ($m->totalDonate/$m->maxDonate)*100;
                                        ?>
                                            <div class="progress-bar" role="progressbar" style="width: {{$per}}%"
                                                aria-valuenow="{{$per}}" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-value"><span>{{$per}}</span>%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul>
                                    <li><span>ยอดที่ได้รับ:</span>{{number_format($m->totalDonate)}}฿ </li>
                                    <li><span>ยอดที่ต้องการ:</span> {{number_format($m->maxDonate)}}฿</li>
                                </ul>
                            </div>
                            <div class="case-btn">

                                <ul>
                                    <li><a href="{{route('donation.cause',['id'=>$id])}}">ดูข้อมูลเพิ่มเติม</a></li>
                                    <li><a href="{{route('donation.cause',['id'=>$id])}}">บริจาค</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="wpo-counter-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wpo-counter-grids">
                    <div class="grid">
                        <div>
                            <h2><span class="odometer" data-count="{{$sumDo}}">00</span>+</h2>
                        </div>
                        <p>การบริจาค</p>
                    </div>
                    <div class="grid">
                        <div>
                            <h2><span class="odometer" data-count="{{$sumUser}}">00</span>+</h2>
                        </div>
                        <p>ผู้บริจาค</p>
                    </div>
                    <div class="grid">
                        <div>
                            <h2><span class="odometer" data-count="{{$sumTea}}">00</span>+</h2>
                        </div>
                        <p>ครูผู้ดูแล</p>
                    </div>
                    <div class="grid">
                        <div>
                            <h2><span class="odometer" data-count="{{$sumStu}}">00</span>+</h2>
                        </div>
                        <p>นักเรียน</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- wpo-mission-area end -->

<div class="wpo-case-area-2 section-padding">
    <div class="container">

        <div class="wpo-case-wrap">
            <div class="row">
                @foreach ($student as $s)


                <div class="col-md-4 col-sm-6 custom-grid col-12">
                    <div class="wpo-case-item">
                        <div class="wpo-case-img">
                            <img src="{{asset('storage/images/'.$s->picture)}}"  style="  width: 100%;  max-height: 190px; height: auto;" alt="">
                        </div>
                        <div class="wpo-case-content">
                            <div class="wpo-case-text-top">
                                <h2>{{$s->name.' '.$s->lastname}}</h2>
                                <div class="progress-section">
                                    <div class="process">
                                        <div class="progress">
                                            <?php
                                            $id =[
                                                'id' =>$s->id,
                                            ];
                                            $id= Crypt::encrypt($id);
                                            $per = ($s->totalDonate/$s->maxDonate)*100;
                                        ?>
                                            <div class="progress-bar" role="progressbar" style="width: {{$per}}%"
                                                aria-valuenow="{{$per}}" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-value"><span>{{$per}}</span>%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul>
                                    <li><span>ยอดที่ได้รับ:</span>{{number_format($s->totalDonate)}}฿ </li>
                                    <li><span>ยอดที่ต้องการ:</span> {{number_format($s->maxDonate)}}฿</li>
                                </ul>
                            </div>
                            <div class="case-btn">

                                <ul>
                                <li><a href="{{route('donation.cause',['id'=>$id])}}">ดูข้อมูลเพิ่มเติม</a></li>
                                    <li><a href="{{route('donation.cause',['id'=>$id])}}">บริจาค</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>


<div class="wpo-mission-area-2 section-padding">
    <div class="container">

        <div class="wpo-mission-wrap">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12 custom-grid">
                    <div class="wpo-mission-item">
                        <div class="wpo-mission-icon">
                            <img src="assets/images/mission/img-8.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12 custom-grid">
                    <div class="wpo-mission-item">
                        <div class="wpo-mission-icon">
                            <img src="assets/images/mission/img-5.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12 custom-grid">
                    <div class="wpo-mission-item">
                        <div class="wpo-mission-icon">
                            <img src="assets/images/mission/img-6.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12 custom-grid">
                    <div class="wpo-mission-item">
                        <div class="wpo-mission-icon">
                            <img src="assets/images/mission/img-7.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wpo-ne-footer">
    <!-- start wpo-news-letter-section -->
    <section class="wpo-news-letter-section">
        <div class="container">
            <div class="row">
                <div class="col col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <!-- <div class="wpo-newsletter">
                            <h3>Follow us For ferther information</h3>
                            <div class="wpo-newsletter-form">
                                <form>
                                    <div>
                                        <input type="text" placeholder="Enter Your Email" class="form-control">
                                        <button type="submit">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div> -->
                </div>
            </div>
        </div> <!-- end container -->
    </section>



    @endsection
