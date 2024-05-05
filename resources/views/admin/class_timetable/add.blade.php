@extends('layout.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
            <h1>Add New Class Time Table List </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <section>
    <div class="container-fluid p-3">

          <div class="card ">

          <div class="card-header">
                <h3 class="card-title">Search Class Time Table List</h3>
              </div>
              <!-- form start -->
              <form action="" method="get">
                <div class="card-body row">
                  <div class="form-group col-md-3">
                    <label >Class Name</label>
                    <input type="text" class="form-control" name="class_name" value="{{ Request::get('class_name') }}"  placeholder="Enter Class Name">
                  </div>
                  <div class="form-group col-md-3">
                    <label >Suject Name</label>
                    <input type="text" class="form-control" name="subject_name" value="{{ Request::get('subject_name') }}"  placeholder="Enter Subject Name">
                  </div>
                
                <!-- /.card-body -->

                <div class="form-group col-md-3" style="margin-top: 30px;">
                  <button type="search" class="btn btn-primary">Search</button>
                  <a href="{{ url('admin/class_timetable/list')}}" class="btn btn-success">Reset</a>
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