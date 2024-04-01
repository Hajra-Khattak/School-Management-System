@extends('layout.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $getRecord->name  }} My Account</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      @include('_message')       

        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit My Account</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">

              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label >Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name',$getRecord->name ) }}" required placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label >Email address</label>
                    <input type="email" value="{{ old('email',$getRecord->email ) }}" class="form-control" name="email" required placeholder="Enter email">
                    <div style="color: red;">
                  {{ $errors->first('email') }} 
                </div>
                  </div>
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

           

         
           
            <!-- /.card -->

          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection