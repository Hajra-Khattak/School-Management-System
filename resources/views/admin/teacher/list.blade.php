@extends('layout.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Teacher List (Total: {{ $getRecord->total() }} ) </h1>
          </div>
          <div class="col-sm-6 " style="text-align: end;">

            <a href="{{ url('admin/teacher/add')}}" class="btn btn-primary">Add New Admin</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section>
    <div class="container-fluid p-3">

          <div class="card ">

          <div class="card-header">
                <h3 class="card-title">Search Teachers</h3>
              </div>
              <!-- form start -->
              <form action="" method="get">
                <div class="card-body row">
                  <div class="form-group col-md-2">
                    <label >Name</label>
                    <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}"  placeholder="Enter Name">
                  </div>
                  <div class="form-group col-md-2">
                    <label >Last Name</label>
                    <input type="text" class="form-control" name="last_name" value="{{ Request::get('last_name') }}"  placeholder="Enter Last Name">
                  </div>
                  <div class="form-group col-md-2">
                    <label >Email address</label>
                    <input type="text" class="form-control" name="email" value="{{ Request::get('email') }}" placeholder="Enter email">
                  </div>
                 
                  <div class="form-group col-md-2">
                    <label >Martial Status</label>
                    <input type="text" class="form-control" name="roll_number" value="{{ Request::get('roll_number') }}" placeholder="Roll Number">
                  </div>
                  <div class="form-group col-md-2">
                    <label >Gender</label>
                    <select name="gender" class="form-control" >
                        <option value="">select Gender</option>
                        <option {{ (Request::get('gender') == 'male')? 'selected' : ''}} value="male">Male</option>
                        <option {{ (Request::get('gender') == 'female')? 'selected' : ''}} value="female">Female</option>
                        <option {{ (Request::get('gender') == 'Other')? 'selected' : ''}} value="Other">Other</option>
                      </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label >Mobile Number</label>
                    <input type="text" class="form-control" name="mobile_number" value="{{ Request::get('mobile_number') }}" placeholder="Mobile Number">
                  </div>
                  <div class="form-group col-md-2">
                    <label >Current Address </label>
                    <input type="text" class="form-control" name="address" value="{{ Request::get('address') }}" placeholder="Enter Address">
                  </div>
                  <div class="form-group col-md-2">
                    <label >Status</label>
                    <select name="status" class="form-control" >
                        <option value="">select status</option>
                        <option {{ (Request::get('status') == '100')? 'selected' : ''}} value="100">Active</option>
                        <option {{ (Request::get('status') == '1')? 'selected' : ''}} value="1">Inactive</option>
                      </select>
                  </div>

                  <div class="form-group col-md-2">
                    <label> Join Date</label>
                    <input type="date" class="form-control" name="admission_date" value="{{ Request::get('admission_date') }}" >
                  </div>

                  <div class="form-group col-md-2">
                    <label> Created Date</label>
                    <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}" >
                  </div>
                
                <!-- /.card-body -->

                <div class="form-group col-md-3" style="margin-top: 30px;">
                  <button type="search" class="btn btn-primary">Search</button>
                  <a href="{{ url('admin/teacher/list')}}" class="btn btn-success">Reset</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
            <!-- /.card -->

          </div>
          
        </div>

        <!-- /.row -->
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <!-- /.col -->
          <div class="col-md-12">
            
          @include('_message')
          
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Teacher List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0 " style="overflow: auto;">
                <table class="table table-striped " style="font-size: 0.85rem;">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Profile Pic</th>
                      <th>Teacher Name</th>
                      <th>Email</th>
                      <th>Gender </th>
                      <th>Date of Birth </th>
                      <th>Date of Join </th>
                      <th>Mobile Number</th> 
                      <th>Martial Status</th> 
                      <th>Current Address</th> 
                      <th>Parmanet Address</th> 
                      <th>Qualification</th> 
                      <th>Work Experience</th> 
                      <th>Note</th> 
                      <th>Status </th>
                      <th>Created Date</th>
                      <th style="text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  @foreach($getRecord as $value)
                    <tr>
                      <td> {{ $value->id}} </td>
                      <td> 
                      @if(!empty($value->getTeacherProfile()) )
                      <img src="{{ $value->getTeacherProfile() }}" style="width:50px; height:50px; border-radius:50%">
                    @endif
                    </td>
                      <td> {{ $value->name}} {{ $value->last_name}} </td>
                      <td> {{ $value->email}} </td>
                      <td> {{ $value->gender}}  </td>
                      <td> 
                        @if(!empty($value->date_of_birth))
                        {{ date('d-m-Y', strtotime($value->date_of_birth))}}
                        @endif

                        <td> 
                        @if(!empty($value->admission_date))
                          {{ date('d-m-Y', strtotime($value->admission_date))}}
                          @endif
                      </td>
                    </td>
                      <td> {{ $value->mobile_number}}  </td>
                      <td> {{ $value->martial_status}}  </td>
                      <td> {{ $value->address}} </td>
                      <td> {{ $value->permanent_address}}  </td> 
                      <td> {{ $value->qualification}}  </td>
                      <td> {{ $value->work_experience}}  </td>
                      <td> {{ $value->note}}  </td>
                      <td> {{ ($value->status == 0)? 'Active': 'Inactive'}}  </td>
                      <td> 
                      @if(!empty($value->created_at))
                        {{ date('d-m-Y', strtotime($value->created_at))}}
                        @endif
                    </td>
                      <td style="min-width:150px">
                        <a href="{{ url('admin/teacher/edit', $value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ url('admin/teacher/delete', $value->id)}}" class="btn btn-danger btn-sm">Delete</a>
                      </td>
                      
                    </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>

              <div class="d-flex justify-content-end p-3">
              {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
            </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      
        
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


  @endsection