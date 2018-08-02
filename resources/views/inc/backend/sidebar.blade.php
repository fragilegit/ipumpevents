<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ Auth::user()->gravatar() }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    {{-- <a href="{{ route('admin.dashboard') }}"> --}}
    <ul class="sidebar-menu" data-widget="tree">
      <li>
        <a href="{{ route('admin.dashboard') }}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview active">
        <a href="#">
          <i class="fa fa-pencil"></i>
          <span>Event</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('event.index') }}"><i class="fa fa-circle-o"></i> All Events</a></li>
          <li><a href="{{ route('event.create') }}"><i class="fa fa-circle-o"></i> Add New</a></li>
        </ul>
      </li> 
      @if(checkUserPermissions(Request(), "Users@index"))
      {{-- @role('admin') --}}
      <li><a href="{{ route('categories.index')}}"><i class="fa fa-folder"></i> <span>Categories</span></a></li>
      <li><a href="{{ route('users.index')}}"><i class="fa fa-users"></i> <span>Users</span></a></li>
      {{-- @endrole --}}
      @endif
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

