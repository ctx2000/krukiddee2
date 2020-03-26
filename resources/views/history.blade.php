@extends('layouts.memberNav')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>

<div class="">
    <style>
        /* Icon when the collapsible content is shown */
        .arrow:after {
          font-family: "Glyphicons Halflings";
          content: "\e114";
          float: right;
          margin-left: 15px;
        }
        /* Icon when the collapsible content is hidden */
        .arrow.collapsed:after {
          content: "\e080";
        }
      </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">ประวัติการบริจาค</h1>
                    <h5>บริจาคไปแล้วทั้งหมด : {{$sumDo}}ครั้ง </h5>
                    <h5>บริจาคไปแล้ว : {{$sumStu}}คน </h5>
                </div>
                <!-- /.col -->

                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h3>ประวัติการบริจาค</h3>
                        </div>
                        <div class="card-body">
                            <div class="panel-group" id="accordion">
                                {{-- คอนเท้น --}}
                                <?php $i=0; ?>
                                @foreach ($stu as $s)
                                <?php $i = $i+1; ?>
                                <div class="panel panel-default">

                                        <div class="panel-heading ">
                                            <a class="arrow" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$i}}">
                                            ชื่อนักเรียน : {{$s->name.' '.$s->lastname}}
                                        </a>
                                        </div>

                                    <div id="collapse{{$i}}" class="panel-collapse collapse">
                                        <table class="table table-striped">
                                            <thead class="thead-light">
                                                <tr>

                                                    <th>จำนวนเงินที่บริจาค</th>
                                                    <th>ความคิดเห็น</th>
                                                    <th>รูป</th>
                                                    <th>สถานะ</th>
                                                </tr>
                                            </thead>
                                            @foreach ($donation as $d)
                                            @if ($s->id == $d->student_id )


                                            <tr>
                                                <td>{{$d->price}}</td>
                                                <td>{{$d->description}}</td>
                                                <td>
                                                    <div class="bigGallPic" id="bigGallDiv"
                                                        onclick="this.style.display='none'">
                                                    </div>
                                                    <a href="{{asset('storage/receipt/'.$d->picture)}}"
                                                        data-toggle="lightbox" data-title="" data-footer="">
                                                        <img class="img-fluid"
                                                            src="{{asset('storage/receipt/'.$d->picture)}}" width="50"
                                                            height="50" alt="">
                                                    </a>
                                                </td>
                                                <td>{{$d->status}}</td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
</script>

@endsection
