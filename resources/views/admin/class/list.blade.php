@extends('layout.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
            <h1>Class List  (Total: {{$getRecord->total() }} )</h1>
          </div>
          <div class="col-sm-6 " style="text-align: end;">

            <a href="{{ url('admin/class/add')}}" class="btn btn-primary">Add New Class</a>
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
                    <label >Name</label>
                    <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}"  placeholder="Enter Name">
                  </div>
                  
                  <div class="form-group col-md-3">
                    <label >Date</label>
                    <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}" placeholder="Enter email">
                  </div>
                
                <!-- /.card-body -->

                <div class="form-group col-md-3" style="margin-top: 30px;">
                  <button type="search" class="btn btn-primary">Search</button>
                  <a href="{{ url('admin/class/list')}}" class="btn btn-success">Reset</a>
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
                <h3 class="card-title">Class List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr >
                      <th >#</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                      <th style="text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($getRecord as $value) 
                  <tr >
                    
                    <td>{{ $value->id}}</td>
                    <td>{{ $value->name}}</td>
                    <td class="text-success">
                      @if($value->status == 0)
                        Active
                      
                      @else
                        <span class="text-danger">Inactive</span>
                  
                      @endif
                     </td>
                    <td>{{ $value->created_by_name}}</td>
                    <td>{{ date('d-m-Y  H:i A', strtotime($value->created_at))}}</td>
                    <td style="text-align: center;">
                    <a href="{{ url('admin/class/edit', $value->id)}}" class="btn btn-primary">Edit</a>
                    <a href="{{ url('admin/class/delete', $value->id)}}" class="btn btn-danger">Delete</a>
                    </td>

                  </tr>
                  @endforeach
                  
                  </tbody>

                </table>
                <div class="d-flex justify-content-end px-3 pt-3">
              {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
              </div>
              </div>

              <div class="d-flex justify-content-end p-3">

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