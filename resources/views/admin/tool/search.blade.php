@extends('layouts/adminNav')
@section('content')



<style>
    /* Icon when the collapsible content is shown */
    .arrow {
      float: right;
      margin-left: 15px;
    }
    /* Icon when the collapsible content is hidden */

  </style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
    </script>
    <!-- Main content -->

    @if($member->isNotEmpty())

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <a  data-toggle="collapse" data-parent="#accordion"
                            href="#collapse1">
                        <h3 class="card-title">Member พบทั้งหมด [ {{count($member)}} ] รายการ</h3>
                        <i class=" arrow fa fa-bars " aria-hidden="true"></i>

                        </a>
                            {{-- <input id="myInput" type="text" placeholder="Search.."> --}}

                        </div>

                        <div class="card-body">
                            <div class="panel-group" id="accordion">
                                {{-- คอนเท้น --}}

                                <div class="panel panel-default">
                                    <div class="panel-heading ">



                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>ชื่อ</th>
                                                    <th>email</th>
                                                    <th>สถานะ</th>
                                                    <th>เครื่องมือ</th>
                                                </tr>
                                            </thead>

                                            <tbody id="myTable">
                                                @foreach ($member as $m)
                                                <tr>
                                                    @php
                                                    $id = Crypt::encrypt($m->id);
                                                    @endphp
                                                    <td>{{$m->id}}</td>
                                                    <td>{{$m->name}}</td>
                                                    <td>{{$m->email}}</td>
                                                    <td>{{$m->status}}</td>
                                                    <td>

                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-secondary btn-sm"><i
                                                                    class="fas fa-cog"></i></button>
                                                            <button type="button"
                                                                class="btn btn-default btn-sm dropdown-toggle dropdown-icon"
                                                                data-toggle="dropdown"></button>
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                            <div class="dropdown-menu" role="menu">
                                                                <a class="dropdown-item"
                                                                    href="{{route('admin.editMember',['id'=>$id])}}">
                                                                    <li class="	fas fa-pen"></li> แก้ไขข้อมูล
                                                                </a>

                                                                @if ($m->status=='ban')
                                                                <a class="dropdown-item"
                                                                    href="{{route('admin.memberUnban',['id'=>$id])}}">
                                                                    <li class="	far fa-calendar-check"></li> ปลดแบน
                                                                </a>
                                                                @else

                                                                <a class="dropdown-item cause" href="#"
                                                                    data-name="{{$m->name}}" data-id="{{$id}}">
                                                                    <li class="fas fa-ban"></li> แบนผู้ใช้
                                                                </a>
                                                                @endif

                                                                <a class="dropdown-item"
                                                                    href="{{route('admin.deleteUser',['id'=>$id])}}">
                                                                    <li class="	fas fa-trash-alt"></li> ลบผู้ใช้
                                                                </a>
                                                                <a class="dropdown-item"
                                                                    href="{{route('admin.memberAbout',['id'=>$id])}}">
                                                                    <li class="	fas fa-list-ul"></li> ดูข้อมูล
                                                                </a>


                                                            </div>


                                                    </td>

                                                </tr>


                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{$member->links()}}
                    </div>
                </div>



            </div>
        </div>
    </section>
    @endif
    @if($teacher->isNotEmpty())
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card border-dark">
                        <div class="card-header">
                            <h3 class="card-title">ครูทั้งหมด &nbsp;</h3>

                            <form class="form-inline ml-3" method="POST" action="{{route('admin.searchTeacher')}}">
                                @csrf
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa fa-search"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="search" placeholder="ค้นหา"
                                        aria-label="search" aria-describedby="basic-addon1">
                                </div>
                            </form>
                            {{-- <form class="form-inline ml-3" method="POST" action="{{route('admin.searchTeacher')}}">
                            @csrf
                            <div class="input-group input-group-sm">
                                <input class="form-control " type="search" placeholder="Search..." aria-label="Search"
                                    name="search">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            </form> --}}
                        </div>
                        <div class="card-body text-dark">

                            <table class="table">
                                <tr>
                                    <th>ชื่อ</th>
                                    <th>นามสกุล</th>
                                    <th>อีเมล์</th>
                                    <th>สถานะ</th>
                                    <th>เครื่องมือ</th>
                                </tr>
                                @foreach ($teacher as $t)
                                @php
                                $id = Crypt::encrypt($t->id);
                                @endphp
                                <tr>
                                    <td>{{$t->name}}</td>
                                    <td>{{$t->lastname}}</td>
                                    <td>{{$t->email}}</td>
                                    <td>{{$t->status}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary btn-sm"><i
                                                    class="fas fa-cog"></i></button>
                                            <button type="button"
                                                class="btn btn-default btn-sm dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown"></button>
                                            <span class="sr-only">Toggle Dropdown</span>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item"
                                                    href="{{route('admin.editTeacher',['id'=>$id])}}">
                                                    <li class="	fas fa-pen"></li> แก้ไขข้อมูล
                                                </a>

                                                @if ($t->status=='ban')
                                                <a class="dropdown-item"
                                                    href="{{route('admin.memberUnban',['id'=>$id])}}">
                                                    <li class="	far fa-calendar-check"></li> ปลดแบน
                                                </a>
                                                @else

                                                <a class="dropdown-item cause" href="#" data-name="{{$t->name}}"
                                                    data-id="{{$id}}">
                                                    <li class="fas fa-ban"></li> แบนผู้ใช้
                                                </a>
                                                @endif

                                                <a class="dropdown-item delete-confirm"
                                                    href="{{route('admin.deleteUser',['id'=>$id])}}">
                                                    <li class="	fas fa-trash-alt"></li> ลบผู้ใช้
                                                </a>
                                                <a class="dropdown-item"
                                                    href="{{route('admin.aboutTeacher',['id'=>$id])}}">
                                                    <li class="	fas fa-list-ul"></li> ดูข้อมูล
                                                </a>


                                            </div>
                                    </td>
                                </tr>

                                @endforeach
                            </table>

                        </div>

                        {{$teacher->links()}}
                    </div>
                </div>





            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    @endif
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
<script src="{{asset('js/sweetalert2.min.js')}}"></script>


<script>
    $('.delete-confirm').on('click', function (e) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal.fire({
                title: 'ต้องการลบผู้ใช้งานนี้หรือไม่?',
                text: 'การลบข้อมูลจะไม่สามารถกู้คืนได้',
                icon: 'warning',
                showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'ยืนยัน'
            }).then((result) => {
          if (result.value) {
                    window.location.href = url;
                }
            });
        });
</script>
<!-- /.container-fluid -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ระบุสาเหตุการแบนผู้ใช้</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('admin.memberBaned')}}">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">แบนผู้ใช้:</label>
                        <input type="text" class="form-control" id="name" readonly>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">สาเหตุ:</label>
                        <textarea class="form-control" id="cause" name="cause"></textarea>
                    </div>
                    <input type="hidden" id="id" name="id">

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">ยืนยัน</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>
<script>
    $('.cause').click(function(){
            // get data from edit btn

            var name = $(this).attr('data-name');
            var id = $(this).attr('data-id');


            // set value to modal
            $("#name").val(name);
            $("#id").val(id);


            $('#myModal').modal('show');
            });
</script>

<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@if (session('feedback'))
<script>
    Swal.fire('ผลการทำงาน',"{{session('feedback')}}",'success');
</script>
@endif


@endsection
