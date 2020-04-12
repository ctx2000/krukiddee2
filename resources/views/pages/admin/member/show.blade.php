@extends('layouts.admin.master')

@push('title')
Krukidee | ชื่อสมาชิก
@endpush

@push('plugin-styles')
<!-- Plugin css import here -->

@endpush

@section('content')
<!-- Page content here -->
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/member/all')}}">ข้อมูลสมาชิก</a></li>
        <li class="breadcrumb-item active" aria-current="page">ชื่อสมาชิก</li>
    </ol>
</nav>

<div class="profile-page tx-13">
  <div class="row profile-body">
    <!-- left wrapper start -->
    <div class="col-md-4 left-wrapper">
      <div class="card grid-margin rounded">
        <div class="card-body">
          <div class="d-flex align-items-start justify-content-end">
            <div class="dropdown">
              <button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="user-x" class="icon-sm mr-2"></i> <span class="">แบนผู้ใช้งาน</span></a>
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="user-check" class="icon-sm mr-2"></i> <span class="">ปลดแบบผู้ใช้งาน</span></a>
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">ลบข้อมูล</span></a>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-center px-5 mb-2">
            <img src="{{ url('https://via.placeholder.com/100x100') }}" class="img-fluid rounded-circle" alt="profile cover">
          </div>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">ชื่อ-นามสกุล :</label>
            <p class="text-muted">November 15, 2015</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">อีเมล :</label>
            <p class="text-muted">New York, USA</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">เบอร์โทรศัพท์ :</label>
            <p class="text-muted">me@nobleui.com</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 font-weight-bold mb-0 text-uppercase">ที่อยู่ :</label>
            <p class="text-muted">www.nobleui.com</p>
          </div>
          <!-- <div class="mt-3 d-flex social-links">
            <a href="javascript:;" class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon github">
              <i data-feather="github" data-toggle="tooltip" title="github.com/nobleui"></i>
            </a>
            <a href="javascript:;" class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon twitter">
              <i data-feather="twitter" data-toggle="tooltip" title="twitter.com/nobleui"></i>
            </a>
            <a href="javascript:;" class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon instagram">
              <i data-feather="instagram" data-toggle="tooltip" title="instagram.com/nobleui"></i>
            </a>
          </div> -->
        </div>
      </div>
    </div>
    <!-- left wrapper end -->
    <div class="col-md-8">
      <div class="row">
        <div class="col-md-4">
          <div class="card grid-margin">
          <div class="card-body">
              <h6 class="card-title mb-2">บริจาคไปแล้ว</h6>
              <h2 class="text-center mb-0">0</h3>
                <small class="d-flex justify-content-center">ครั้ง</small>
          </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card grid-margin">
          <div class="card-body">
              <h6 class="card-title mb-2">ยอดบริจาครวม</h6>
              <h2 class="text-center mb-0">0</h3>
                <small class="d-flex justify-content-center">บาท</small>
          </div>
          </div>
        </div>
        <div class="col-12">
          <div class="card grid-margin stretch-card">
            <div class="card-body">
              <h6 class="card-title">รายการการบริจาค</h6>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>LAST NAME</th>
                      <th>USERNAME</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                    </tr>
                    <tr>
                      <th>2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>@fat</td>
                    </tr>
                    <tr>
                      <th>3</th>
                      <td>Larry</td>
                      <td>the Bird</td>
                      <td>@twitter</td>
                    </tr>
                    <tr>
                      <th>4</th>
                      <td>Larry</td>
                      <td>Jellybean</td>
                      <td>@lajelly</td>
                    </tr>
                    <tr>
                      <th>5</th>
                      <td>Larry</td>
                      <td>Kikat</td>
                      <td>@lakitkat</td>
                    </tr>
                  </tbody>
                </table>
            </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
<!-- Plugin js import here -->
@endpush

@push('custom-scripts')
<!-- Custom js here -->
@endpush
