@extends('layout.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
            <h1>Subjects List  </h1>
          </div>
          <div class="col-sm-6 " style="text-align: end;">

            <a href="{{ url('admin/subject/add')}}" class="btn btn-primary">Add New Subject</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
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
                <h3 class="card-title">My Subject List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr >
                      <th>Name</th>
                      <th>Type</th>
                  
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($getRecord as $value)
                    <tr>
                      <td>{{ $value->subject_name}}</td>
                      <td>{{ $value->subject_type}}</td>
                      </tr>
                    @endforeach                 
                  
                  </tbody>

                </table>
               
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