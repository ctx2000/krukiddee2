@extends('layouts.memberNav')

@section('content')
<div class="">
    <div class="content-header">

        <!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container">
            <div class="row">

                <div class="col-md">
                    <div id="carouselExampleCaptions" class="carousel slide my-3" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="http://placehold.it/900x350" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>First slide label</h5>
                              <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="http://placehold.it/900x350" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>Second slide label</h5>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="http://placehold.it/900x350" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>Third slide label</h5>
                              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                            </div>
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                </div>
            </div>
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header">
                                <h3>หัวข้อ </h3>
                            </div>
                            <div class="card-body">
                                {{-- คอนเท้น --}}
                                <div class="row">

                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="card h-100">
                                        <a href="#"><img class="card-img-top" src="" alt=""></a>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="#">ชื่อ</a>
                                            </h4>
                                            <h5>เทส</h5>
                                            <p class="card-text">เทส</p>
                                        </div>
                                        <div class="card-footer">

                                            <div class="btn-toolbar justify-content-between" role="toolbar"
                                                aria-label="Toolbar with button groups">
                                                <div class="btn-group mr-1" role="group" aria-label="First group">

                                                    <a href=" #" class="btn btn-outline-danger">เพิ่มคำขอบคุณ</a>

                                                </div>



                                                <div class="input-group">
                                                    <div class="btn-group" role="group" aria-label="3 group">
                                                        <a class="btn btn-outline-info" href="#">

                                                            <li style="color: #0f5e52;" class="fa fa-pencil "></li>

                                                        </a>

                                                    </div>
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                        <form action="#" method="POST" class="d-inline"
                                                            onsubmit="return confirm('ต้องการลบข้อมูล?')">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button class="btn btn-outline-secondary ">

                                                                <li style=" color: #545c5b;" class="fa fa-trash "></li>

                                                            </button>

                                                        </form>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 mb-4"></div>
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="card h-100">
                                        <a href="#"><img class="card-img-top" src="" alt=""></a>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="#">ชื่อ</a>
                                            </h4>
                                            <h5>เทส</h5>
                                            <p class="card-text">เทส</p>
                                        </div>
                                        <div class="card-footer">

                                            <div class="btn-toolbar justify-content-between" role="toolbar"
                                                aria-label="Toolbar with button groups">
                                                <div class="btn-group mr-1" role="group" aria-label="First group">

                                                    <a href=" #" class="btn btn-outline-danger">เพิ่มคำขอบคุณ</a>

                                                </div>



                                                <div class="input-group">
                                                    <div class="btn-group" role="group" aria-label="3 group">
                                                        <a class="btn btn-outline-info" href="#">

                                                            <li style="color: #0f5e52;" class="fa fa-pencil "></li>

                                                        </a>

                                                    </div>
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                        <form action="#" method="POST" class="d-inline"
                                                            onsubmit="return confirm('ต้องการลบข้อมูล?')">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button class="btn btn-outline-secondary ">

                                                                <li style=" color: #545c5b;" class="fa fa-trash "></li>

                                                            </button>

                                                        </form>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



@endsection
