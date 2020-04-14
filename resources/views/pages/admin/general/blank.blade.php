@extends('layouts.admin.master')

@push('title')
  Krukidee | หน้าหลัก
@endpush

@push('plugin-styles')
  <!-- Plugin css import here -->
  {!! Html::style('admin/assets/plugins/select2/select2.min.css') !!}
@endpush

@section('content')
  <!-- Page content here -->
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Select 2</h4>
          <p class="card-description">Read the <a href="https://select2.org/" target="_blank"> Official Select2 Documentation </a>for a full list of instructions and other options.</p>
          <div class="form-group">
            <label>Single select box using select 2</label>
            <select class="js-example-basic-single w-100">
              <option value="TX">Texas</option>
              <option value="NY">New York</option>
              <option value="FL">Florida</option>
              <option value="KN">Kansas</option>
              <option value="HW">Hawaii</option>
            </select>
          </div>
          <div class="form-group">
            <label>Multiple select using select 2</label>
            <select class="js-example-basic-multiple w-100" multiple="multiple">
              <option value="TX">Texas</option>
              <option value="WY">Wyoming</option>
              <option value="NY">New York</option>
              <option value="FL">Florida</option>
              <option value="KN">Kansas</option>
              <option value="HW">Hawaii</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@push('plugin-scripts')
  <!-- Plugin js import here -->
  {!! Html::script('admin/assets/plugins/select2/select2.min.js') !!}
@endpush

@push('custom-scripts')
  <!-- Custom js here -->
  {!! Html::script('admin/assets/js/select2.js') !!}
@endpush
