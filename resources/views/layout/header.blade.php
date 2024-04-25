
 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
  

    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge">3</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{ url('public/dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Brad Diesel
                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">Call me whenever you can...</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{ url('public/dist/img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                John Pierce
                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">I got your message bro</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{ url('public/dist/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Nora Silvester
                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">The subject goes here</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
      </div>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">15</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">15 Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-envelope mr-2"></i> 4 new messages
          <span class="float-right text-muted text-sm">3 mins</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-users mr-2"></i> 8 friend requests
          <span class="float-right text-muted text-sm">12 hours</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-file mr-2"></i> 3 new reports
          <span class="float-right text-muted text-sm">2 days</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
    </li>
    
  </ul>
</nav>
<!-- /.navbar -->

  <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="javascript:;" class="brand-link text-center">
    <span class="brand-text font-weight-light  "> <b>School Pro</b></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ url('public/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name}}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
       
      
         @if(Auth::user()->user_type == 1)
         <li class="nav-item">
          <a href="{{url('admin/dashboard')}}" class="nav-link  @if(Request::segment(2) == 'dashboard') active @endif " >
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard  
            
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('admin/admin/list')}}" class="nav-link @if(Request::segment(2) == 'admin') active @endif " >
            <i class="nav-icon far fa-user"></i>
            <p>
              Admin
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('admin/student/list')}}" class="nav-link @if(Request::segment(2) == 'student') active @endif " >
            <i class="nav-icon far fa-user"></i>
            <p>
              Students
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('admin/parent/list')}}" class="nav-link @if(Request::segment(2) == 'parent') active @endif " >
            <i class="nav-icon far fa-user"></i>
            <p>
              Parents
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('admin/teacher/list')}}" class="nav-link @if(Request::segment(2) == 'teacher') active @endif " >
            <i class="nav-icon far fa-user"></i>
            <p>
              Teacher
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{url('admin/class/list')}}" class="nav-link @if(Request::segment(2) == 'class') active @endif " >
            <i class="nav-icon far fa-user"></i>
            <p>
              Class
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('admin/subject/list')}}" class="nav-link @if(Request::segment(2) == 'subject') active @endif " >
            <i class="nav-icon far fa-user"></i>
            <p>
              Subject
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('admin/assign_subject/list')}}" class="nav-link @if(Request::segment(2) == 'assign_subject') active @endif " >
            <i class="nav-icon far fa-user"></i>
            <p>
              Assign Subject
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('admin/assign_class/list')}}" class="nav-link @if(Request::segment(2) == 'assign_class') active @endif " >
            <i class="nav-icon far fa-user"></i>
            <p>
              Assign Class
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('admin/change_password')}}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif " >
            <i class="nav-icon far fa-user"></i>
            <p>
              Change Password
            </p>
          </a>
        </li>

        </li> <li class="nav-item">
          <a href="{{url('admin/account')}}" class="nav-link @if(Request::segment(2) == 'account') active @endif " >
            <i class="nav-icon far fa-user"></i>
            <p>
              My Account
            </p>
          </a>
        </li>

         @elseif(Auth::user()->user_type == 2)
         <li class="nav-item">
          <a href="{{url('teacher/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif" >
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            
            </p>
          </a>
        </li>
         <li class="nav-item">
          <a href="{{url('teacher/my_class_subjects')}}" class="nav-link @if(Request::segment(2) == 'my_class_subjects') active @endif" >
            <i class="nav-icon fas fa-user"></i>
            <p>
              My Class and Subjects
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{url('teacher/account')}}" class="nav-link @if(Request::segment(2) == 'account') active @endif " >
            <i class="nav-icon far fa-user"></i>
            <p>
              My Account
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{url('teacher/change_password')}}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif " >
            <i class="nav-icon far fa-user"></i>
            <p>
              Change Password
            </p>
          </a>
        </li>

         @elseif(Auth::user()->user_type == 3)
         <li class="nav-item">
          <a href="{{url('student/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif" >
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p> 
              Dashboard     
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('student/change_password')}}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif " >
            <i class="nav-icon far fa-user"></i>
            <p>
              Change Password
            </p>
          </a>
        </li> <li class="nav-item">
          <a href="{{url('student/account')}}" class="nav-link @if(Request::segment(2) == 'account') active @endif " >
            <i class="nav-icon far fa-user"></i>
            <p>
              My Account
            </p>
          </a>
        </li>
        </li> <li class="nav-item">
          <a href="{{url('student/my_subjects')}}" class="nav-link @if(Request::segment(2) == 'account') active @endif " >
            <i class="nav-icon far fa-user"></i>
            <p>
              My Subjects
            </p>
          </a>
        </li>


         @elseif(Auth::user()->user_type == 4)

         <li class="nav-item">
          <a href="{{url('parent/dashboard') }}" class="nav-link @if(Request::segment(2) == 'admin') active @endif" >
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard 
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('parent/change_password')}}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif " >
            <i class="nav-icon far fa-user"></i>
            <p>
              Change Password
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('parent/account')}}" class="nav-link @if(Request::segment(2) == 'account') active @endif " >
            <i class="nav-icon far fa-user"></i>
            <p>
              My Account
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('parent/my_student')}}" class="nav-link @if(Request::segment(2) == 'my_student') active @endif " >
            <i class="nav-icon far fa-user"></i>
            <p>
              My Student
            </p>
          </a>
        </li>

         @endif
        
        
        
        <li class="nav-item mb-0 pb-0 footer">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex"></div>
              <a href="{{url('/logout')}}" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p>
                  Logout
                </p>
              </a>
        </li>
        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

