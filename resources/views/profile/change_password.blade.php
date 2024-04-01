@extends('layout.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12 mt-2">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header my-3">
                <h3 class="card-title">Change Password</h3>
              </div>

          @include('_message')

              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">

              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Old Password</label>
                    <input type="password" class="form-control" name="password"  required placeholder=" ********** ">
                  </div>
                  <div class="form-group">
                    <label>New  Password</label>
                    <input type="password" class="form-control" name="new_password"  required placeholder=" ********** ">
                  </div>
                 
                 
                  
                
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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