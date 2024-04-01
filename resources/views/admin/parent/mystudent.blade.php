@extends('layout.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parent Student List ({{ $getParent->name }}) ({{ $getParent->last_name }})</h1>
          </div>
          <div class="col-sm-6 " style="text-align: end;">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section>
    <div class="container-fluid p-3">

          <div class="card ">

          <div class="card-header">
                <h3 class="card-title">Search Students</h3>
              </div>
              <!-- form start -->
              <form action="" method="get">
                <div class="card-body row">
                  <div class="form-group col-md-2">
                    <label >Student Id</label>
                    <input type="text" class="form-control" name="id" value="{{ Request::get('id') }}"  placeholder="Enter Id">
                  </div>
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
                    <label> Created Date</label>
                    <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}" >
                  </div>
                
                <!-- /.card-body -->

                <div class="form-group col-md-3" style="margin-top: 30px;">
                  <button type="search" class="btn btn-primary">Search</button>
                  <a href="{{ url('admin/parent/my-student/'. $parent_id)}}" class="btn btn-success">Reset</a>
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

    @if(!empty($getSearchStudent))
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Parent Student List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0 " style="overflow: auto;">
              <table class="table table-striped " style="font-size: 0.85rem;">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Profile Pic</th>
                      <th>Student Name</th>
                      <th>Email</th>
                      <th>Parent Name</th>
                      <th>Created Date</th>
                      <th style="text-align: center;">Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($getSearchStudent as $value)
                  <tr>
                      <th >{{ ($value->id)}}</th>
                      <td> 
                    @if(!empty($value->getProfile()) )
                      <img src="{{ $value->getProfile() }}" style="width:50px; height:50px; border-radius:50%">
                    @endif
                    </td>
                      <td>{{ ($value->name)}}{{ ($value->last_name)}}</td>
                      <td>{{ ($value->email)}}</td>
                      <td>{{ ($value->parent_name)}}</td>
                      <td>{{ date('d-m-Y', strtotime($value->created_at))  }}</td>
                      <td style="min-width:240px; text-align:center">
                        <a href="{{ url('admin/parent/assign_student_parent/'. $value->id . '/'. $parent_id)}}" class="btn btn-info btn-sm">Assign Student</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

              <div class="d-flex justify-content-end p-3">
              
            </div>
              <!-- /.card-body -->

              
            </div>
            <!-- /.card -->
@endif
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Parent Student List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0 " style="overflow: auto;">
              <table class="table table-striped " style="font-size: 0.85rem;">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Profile Pic</th>
                      <th>Student Name</th>
                      <th>Email</th>
                      <th>Parent Name</th>
                      <th>Created Date</th>
                      <th style="text-align: center;">Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($getRecord as $value)
                  <tr>
                      <th >{{ ($value->id)}}</th>
                      <td> 
                    @if(!empty($value->getProfile()) )
                      <img src="{{ $value->getProfile() }}" style="width:50px; height:50px; border-radius:50%">
                    @endif
                    </td>
                      <td>{{ ($value->name)}}{{ ($value->last_name)}}</td>
                      <td>{{ ($value->email)}}</td>
                      <td>{{ ($value->parent_name)}}</td>
                      <td>{{ date('d-m-Y', strtotime($value->created_at))  }}</td>
                      <td style="min-width:240px; text-align:center">
                        <a href="{{ url('admin/parent/assign_student_parent_delete/'. $value->id )}}" class="btn btn-danger btn-sm">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>


          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      
        
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


  @endsection