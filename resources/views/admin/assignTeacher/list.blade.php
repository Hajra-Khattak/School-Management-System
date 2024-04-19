@extends('layout.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
            <h1>Class Assign to Teacher  (Total:  )</h1>
          </div>
          <div class="col-sm-6 " style="text-align: end;">

            <a href="{{ url('admin/assign_class/add')}}" class="btn btn-primary">Assign Class to Teacher</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section>
    <div class="container-fluid p-3">

          <div class="card ">

          <div class="card-header">
                <h3 class="card-title">Search Class List</h3>
              </div>
              <!-- form start -->
              <form action="" method="get">
                <div class="card-body row">
                  <div class="form-group col-md-3">
                    <label >Class Name</label>
                    <input type="text" class="form-control" name="class_name" value="{{ Request::get('class_name') }}"  placeholder="Enter Class Name">
                  </div>
                  <div class="form-group col-md-3">
                    <label >Teacher Name</label>
                    <input type="text" class="form-control" name="subject_name" value="{{ Request::get('subject_name') }}"  placeholder="Enter Subject Name">
                  </div>
                  
                  <div class="form-group col-md-3">
                    <label >Date</label>
                    <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}" placeholder="Enter email">
                  </div>
                
                <!-- /.card-body -->

                <div class="form-group col-md-3" style="margin-top: 30px;">
                  <button type="search" class="btn btn-primary">Search</button>
                  <a href="{{ url('admin/assign_class/list')}}" class="btn btn-success">Reset</a>
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
                <h3 class="card-title">Subject Assign List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr >
                      <th >#</th>
                      <th>Class Name</th>
                      <th>Teacher Name</th>
                      <th>Status</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                      <th style="text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                 
                  @foreach($getRecord as $value)
                  <tr>
                      <td>{{ $value->id}}</td>
                      <td>{{ $value->class_name}}</td>
                      <td>{{ $value->teacher_name}}</td>
                      <td>
                        @if($value->status == 0 )
                        Active
                        @else
                        InActive
                        @endif
                      </td>
                      <td>{{ $value->created_by_name}}</td>
                      <td>{{ date('d-m-Y H:i A ', strtotime($value->created_at))}}</td>
                      <td style="text-align: center;">
                    <a href="{{ url('admin/assign_subject/edit', $value->id)}}" class="btn btn-primary">Edit</a>
                    <a href="{{ url('admin/assign_subject/edit_single', $value->id)}}" class="btn btn-info">Single Edit</a>
                    <a href="{{ url('admin/assign_subject/delete', $value->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                      </tr>
                  @endforeach
                  </tbody>

                </table>
                <div class="d-flex justify-content-end px-3 pt-3">
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

              </div>
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