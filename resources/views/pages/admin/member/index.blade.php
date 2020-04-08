@extends('layouts.admin.master')

@push('title')
  Krukidee | ข้อมูลสมาชิก
@endpush

@push('plugin-styles')
  <!-- Plugin css import here -->
  {!! Html::style('admin/assets/plugins/datatables-net/dataTables.bootstrap4.css') !!}
@endpush

@section('content')
  <!-- Page content here -->
  <nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">ข้อมูลสมาชิก</a></li>
    <li class="breadcrumb-item active" aria-current="page">ทั้งหมด</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <!-- <h6 class="card-title">รายชื่อสมาชิก</h6> -->
        <!-- <p class="card-description">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> -->
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th width=10>#</th>
                <th>ชื่อ-นามสกุล</th>
                <th>อีเมล</th>
                <th>โทรศัพท์</th>
                <th>สถานะ</th>
                <th width=10 class="text-center">จัดการ</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>
                  <div class="btn-group">
                  	<button type="button" class="btn btn-light btn-icon"><i class="icon-lg" data-feather="settings"></i></button>
                  	<button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  		<span class="sr-only">Toggle Dropdown</span>
                  	</button>
                  	<div class="dropdown-menu">
                  		<a class="dropdown-item" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">ดูข้อมูล</span></a>
                  		<a class="dropdown-item" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">แก้ไข</span></a>
                  		<a class="dropdown-item" href="#"><i data-feather="slash" class="icon-sm mr-2"></i> <span class="">แบนผู้ใช้</span></a>
                      <a class="dropdown-item" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">ลบข้อมูล</span></a>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <!-- Plugin js import here -->
  {!! Html::script('admin/assets/plugins/datatables-net/jquery.dataTables.js') !!}
  {!! Html::script('admin/assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') !!}
@endpush

@push('custom-scripts')
  <!-- Custom js here -->
  {!! Html::script('admin/assets/js/data-table.js') !!}
@endpush
