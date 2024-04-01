@extends('layout.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">New Subject</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">

              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Subject Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $getRecord->name)}}" required placeholder="Enter Subject Name">
                  </div>
                  <div class="form-group">
                    <label >Status</label>
                    <select name="status" id="" class="form-control">
                      <option value="">select type</option>
                        <option value="0" {{($getRecord->status == 0) ? 'selected': ''}}>Active</option>
                        <option value="1" {{($getRecord->status == 1) ? 'selected': ''}}>InActive</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label >Type</label>
                    <select name="type" id="" class="form-control">
                        
                        <option value="Theory" {{($getRecord->type == 'theory') ? 'selected': ''}}>Theory</option>
                        <option value="Practicle" {{($getRecord->type == 'practicle') ? 'selected': ''}}>Practicle</option>
                    </select>
                  </div>
                 
                  
                
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"> Update </button>
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