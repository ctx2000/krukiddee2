@extends('layouts.memberNav')

@section('content')
<div class="wpo-breadcumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>Single Causes</h2>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><span>Causes</span></li>
                        <li><span>Ensure Education for every poor children</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="wpo-case-details-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-md-8">
                <div class="wpo-case-details-wrap">
                    <div class="wpo-case-details-img">
                        {{-- style="  width: 100%;  max-height: 600px; height: auto;" --}}
                        <img src="{{asset('storage/images/'.$s->picture)}}" alt="">
                    </div>
                    <div class="wpo-case-details-tab">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#Description">รายละเอียด</a></li>
                            <li><a data-toggle="tab" href="#Donations">บริจาค</a></li>
                            {{-- <li><a data-toggle="tab" href="#Comments">Comments</a></li> --}}
                        </ul>
                    </div>
                    <div class="wpo-case-details-text">
                        <div class="tab-content">
                            <div id="Description" class="tab-pane active">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="wpo-case-content">
                                            <div class="wpo-case-text-top">
                                                <h2>{{$s->name.' '.$s->lastname}}</h2>
                                                <div class="progress-section">
                                                    <div class="process">
                                                        <div class="progress">
                                                            <?php

                                            $per = ($s->totalDonate/$s->maxDonate)*100;
                                        ?>
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: {{$per}}%" aria-valuenow="{{$per}}"
                                                                aria-valuemin="0" aria-valuemax="100">
                                                                <div class="progress-value"><span>{{$per}}</span>%</div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li><span>ยอดที่ได้รับ:</span>{{number_format($s->totalDonate)}}฿
                                                    </li>
                                                    <li><span>ยอดที่ต้องการ:</span> {{number_format($s->maxDonate)}}฿
                                                    </li>
                                                    <li><span>มีผู้บริจาคไปแล้ว:</span> {{$sum}}ครั้ง</li>
                                                </ul>
                                                <div class="case-b-text">
                                                    <p>{{$s->description}}</p>
                                                    {{-- <p>These cases are perfectly simple and easy to distinguish. In a
                                                        free hour, when our power of choice is untrammelled and when
                                                        nothing prevents our being able to do what we like best, every
                                                        pleasure is to be welcomed and every pain avoided.</p>
                                                    <p>But in certain circumstances and owing to the claims of duty or
                                                        the obligations of business it will frequently occur that
                                                        pleasures have to be repudiated and annoyances accepted. The
                                                        wise man therefore always holds in these matters to this
                                                        principle of selection: he rejects pleasures.</p> --}}
                                                </div>
                                                <div class="case-bb-text">
                                                    <h3>We want to ensure the education for the kids.</h3>
                                                    <p>These cases are perfectly simple and easy to distinguish. In a
                                                        free hour, when our power of choice is untrammelled and when
                                                        nothing prevents our being able to do what we like best, every
                                                        pleasure.</p>
                                                    <ul>
                                                        <li>The wise man therefore always holds in these matters.</li>
                                                        <li>In a free hour, when our power of choice and when nothing.
                                                        </li>
                                                        <li>Else he endures pains to avoid worse pains.</li>
                                                        <li>We denounce with righteous indignation and dislike men.
                                                        </li>
                                                        <li>Which is the same as saying through.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div id="Comments" class="tab-pane wpo-blog-single-section">
                                <div class="comments-area">
                                    <div class="comments-section">
                                        <h3 class="comments-title">Comments</h3>
                                        <ol class="comments">
                                            <li class="comment even thread-even depth-1" id="comment-1">
                                                <div id="div-comment-1">
                                                    <div class="comment-theme">
                                                        <div class="comment-image"><img
                                                                src="assets/images/blog-details/comments-author/img-1.jpg"
                                                                alt></div>
                                                    </div>
                                                    <div class="comment-main-area">
                                                        <div class="comment-wrapper">
                                                            <div class="comments-meta">
                                                                <h4>John Abraham <span class="comments-date">Octobor
                                                                        28,2018 At 9.00am</span></h4>
                                                            </div>
                                                            <div class="comment-area">
                                                                <p>I will give you a complete account of the system, and
                                                                    expound the actual teachings of the great explorer
                                                                    of the truth, </p>
                                                                <div class="comments-reply">
                                                                    <a class="comment-reply-link" href="#"><i
                                                                            class="fa fa-reply"
                                                                            aria-hidden="true"></i><span>Reply</span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="children">
                                                    <li class="comment">
                                                        <div>
                                                            <div class="comment-theme">
                                                                <div class="comment-image"><img
                                                                        src="assets/images/blog-details/comments-author/img-2.jpg"
                                                                        alt></div>
                                                            </div>
                                                            <div class="comment-main-area">
                                                                <div class="comment-wrapper">
                                                                    <div class="comments-meta">
                                                                        <h4>Lily Watson <span
                                                                                class="comments-date">Octobor 28,2018 At
                                                                                9.00am</span></h4>
                                                                    </div>
                                                                    <div class="comment-area">
                                                                        <p>I will give you a complete account of the
                                                                            system, and expound the actual teachings of
                                                                            the great explorer of the truth, </p>
                                                                        <div class="comments-reply">
                                                                            <a class="comment-reply-link"
                                                                                href="#"><span><i class="fa fa-reply"
                                                                                        aria-hidden="true"></i>
                                                                                    Reply</span></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <ul>
                                                            <li class="comment">
                                                                <div>
                                                                    <div class="comment-theme">
                                                                        <div class="comment-image"><img
                                                                                src="assets/images/blog-details/comments-author/img-3.jpg"
                                                                                alt></div>
                                                                    </div>
                                                                    <div class="comment-main-area">
                                                                        <div class="comment-wrapper">
                                                                            <div class="comments-meta">
                                                                                <h4>John Abraham <span
                                                                                        class="comments-date">Octobor
                                                                                        28,2018 At 9.00am</span></h4>
                                                                            </div>
                                                                            <div class="comment-area">
                                                                                <p>I will give you a complete account of
                                                                                    the system, and expound the actual
                                                                                    teachings of the great explorer of
                                                                                    the truth, </p>
                                                                                <div class="comments-reply">
                                                                                    <a class="comment-reply-link"
                                                                                        href="#"><span><i
                                                                                                class="fa fa-reply"
                                                                                                aria-hidden="true"></i>
                                                                                            Reply</span></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ol>
                                    </div> <!-- end comments-section -->
                                </div> <!-- end comments-area -->
                                <div class="comment-respond">
                                    <h3 class="comment-reply-title">Leave a Comment</h3>
                                    <form method="post" id="commentform" class="comment-form">
                                        <div class="form-inputs">
                                            <input placeholder="Name" type="text">
                                            <input placeholder="Email" type="email">
                                            <input placeholder="Website" type="url">
                                        </div>
                                        <div class="form-textarea">
                                            <textarea id="comment" placeholder="Write Your Comments..."></textarea>
                                        </div>
                                        <div class="form-submit">
                                            <input id="submit" value="Reply" type="submit">
                                        </div>
                                    </form>
                                </div>
                            </div> --}}
                            <div id="Donations" class="tab-pane">
                                <form action=" {{route('donation.store')}} " method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="wpo-donations-amount">
                                        <h2>รายละเอียดการบริจาค</h2>
                                        <h4>บัญชีของ : {{$s->bank_of}}</h4>
                                        <h3>ธนาคาร : {{$s->bankName}}</h3>
                                        <h3>ชื่อบัญชี : {{$s->bankAccountName}}</h3>
                                        <h3>เลขที่บัญชี : {{$s->bankNumber}}</h3>

                                    </div>
                                    <div class="wpo-donations-details">
                                        <h2>ยืนยันการบริจาค</h2>
                                        <div class="row">

                                            <div class="col-lg-12 col-12 form-group">
                                                <input type="number" class="form-control" name="price" id="price"
                                                    placeholder="จำนวนเงินที่บริจาค">
                                            </div>
                                            <div class="col-lg-12 col-12 form-group">
                                                <textarea class="form-control" name="description" id="description"
                                                    placeholder="แสดงความคิดเห็น"></textarea>
                                            </div>
                                            <div class="col-lg-12 col-12 form-group">
                                                <label for="pic">ยืนยันใบเสร็จการบริจาค</label>
                                                <input type="file" class="form-control" id="picture" name="picture"
                                                    placeholder="" required autofocus>
                                            </div>

                                        </div>
                                    </div>
                                    <input type="hidden" name="student_id" value="{{$s->id}}">
                                    <div class="submit-area">
                                        <button type="submit" class="theme-btn submit-btn">ยืนยันการบริจาค</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-md-4">
                <div class="wpo-blog-sidebar">

                    <div class="widget recent-post-widget">
                        <h3>นักเรียนที่ต้องการรับบริจาค</h3>
                        @foreach ($max as $m)
                        <?php $myDateTime = DateTime::createFromFormat('Y-m-d', $m->closeDonate);
                                    $formattedweddingdate = $myDateTime->format('d-m-Y');
                                    $id =[
                                                'id' =>$m->id,
                                            ];
                                            $id= Crypt::encrypt($id); ?>
                        <div class="posts">
                            <div class="post">
                                <div class="img-holder">
                                     {{-- style="  width: 100%;  max-height: 600px; height: auto;" --}}
                        <img src="{{asset('storage/images/'.$s->picture)}}" style="  width: 100%;  max-height: 70px; height: auto;" alt="">
                                </div>
                                <div class="details">
                                    <h4><a
                                            href="{{route('donation.cause',['id'=>$id])}}">{{$m->name.' '.$m->lastname}}</a>
                                    </h4>

                                    <span class="date">ปิดรับบริจาควันที่ : {{$formattedweddingdate}}</span>
                                </div>
                            </div>


                        </div>
                        @endforeach
                    </div>
                    {{-- <div class="widget tag-widget">
                        <h3>Tags</h3>
                        <ul>
                            <li><a href="#">Donations</a></li>
                            <li><a href="#">Charity</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">Non Profit</a></li>
                            <li><a href="#">Poor People</a></li>
                            <li><a href="#">Helping Hand</a></li>
                            <li><a href="#">Video</a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
