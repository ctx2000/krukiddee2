@extends('layouts.memberNav')

@section('content')
<div class="wpo-case-area-2 section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- <div class="wpo-section-title">
                    <span>ทั้งหมด</span>
                    <h2>ผู้ต้องการได้รับบริจาค</h2>
                </div> -->
            </div>
        </div>
        <div class="wpo-case-wrap">
            <div class="row">
                @foreach ($donate as $s)


                <div class="col-md-4 col-sm-6 custom-grid col-12">
                    <div class="wpo-case-item">
                        <div class="wpo-case-img">
                            <img src="{{asset('storage/images/'.$s->picture)}}" style="  width: 100%;  max-height: 190px; height: auto;" alt="">
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

@endsection
