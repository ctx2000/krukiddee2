<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      Kru<span>Kiddee</span>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item {{ active_class(['administrator/blank']) }}">
        <a href="{{ url('administrator/blank') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">จัดการสมาชิก</li>
      <li class="nav-item {{ active_class(['administrator/member']) }}">
        <a href="{{ route('admin.member') }}" class="nav-link">
          <i class="link-icon" data-feather="smile"></i>
          <span class="link-title">ข้อมูลสมาชิก</span>
        </a>
      </li>
      <li class="nav-item nav-category">จัดการครู</li>
      <li class="nav-item {{ active_class(['apps/chat']) }}">
        <a href="{{ url('/apps/chat') }}" class="nav-link">
          <i class="link-icon" data-feather="book-open"></i>
          <span class="link-title">ข้อมูลครู</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['apps/chat']) }}">
        <a href="{{ url('/apps/chat') }}" class="nav-link">
          <i class="link-icon" data-feather="book"></i>
          <span class="link-title">เพิ่มข้อมูลครู</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['apps/chat']) }}">
        <a href="{{ url('/apps/chat') }}" class="nav-link">
          <i class="link-icon" data-feather="toggle-right"></i>
          <span class="link-title">อนุมัติครู</span>
        </a>
      </li>
      <li class="nav-item nav-category">จัดการนักเรียน</li>
      <li class="nav-item {{ active_class(['apps/chat']) }}">
        <a href="{{ url('/apps/chat') }}" class="nav-link">
          <i class="link-icon" data-feather="users"></i>
          <span class="link-title">ข้อมูลนักเรียน</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['apps/chat']) }}">
        <a href="{{ url('/apps/chat') }}" class="nav-link">
          <i class="link-icon" data-feather="user-plus"></i>
          <span class="link-title">เพิ่มข้อมูลนักเรียน</span>
        </a>
      </li>
      <li class="nav-item nav-category">จัดการการบริจาค</li>
      <li class="nav-item {{ active_class(['apps/chat']) }}">
        <a href="{{ url('/apps/chat') }}" class="nav-link">
          <i class="link-icon" data-feather="trending-up"></i>
          <span class="link-title">ข้อมูลการบริจาค</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['apps/chat']) }}">
        <a href="{{ url('/apps/chat') }}" class="nav-link">
          <i class="link-icon" data-feather="check-square"></i>
          <span class="link-title">ตรวจสอบการบริจาค</span>
        </a>
      </li>
      <li class="nav-item nav-category">Docs</li>
      <li class="nav-item">
        <a href="https://www.nobleui.com/laravel/documentation/docs.html" target="_blank" class="nav-link">
          <i class="link-icon" data-feather="hash"></i>
          <span class="link-title">Documentation</span>
        </a>
      </li>
    </ul>
  </div>
</nav>
<!-- <nav class="settings-sidebar">
  <div class="sidebar-body">
    <a href="#" class="settings-sidebar-toggler">
      <i data-feather="settings"></i>
    </a>
    <h6 class="text-muted">Sidebar:</h6>
    <div class="form-group border-bottom">
      <div class="form-check form-check-inline">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
          Light
        </label>
      </div>
      <div class="form-check form-check-inline">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
          Dark
        </label>
      </div>
    </div>
    <div class="theme-wrapper">
      <h6 class="text-muted mb-2">Light Version:</h6>
      <a class="theme-item active" href="https://www.nobleui.com/laravel/template/light/">
        <img src="{{ url('assets/images/screenshots/light.jpg') }}" alt="light version">
      </a>
      <h6 class="text-muted mb-2">Dark Version:</h6>
      <a class="theme-item" href="https://www.nobleui.com/laravel/template/dark">
        <img src="{{ url('assets/images/screenshots/dark.jpg') }}" alt="light version">
      </a>
    </div>
  </div>
</nav> -->
