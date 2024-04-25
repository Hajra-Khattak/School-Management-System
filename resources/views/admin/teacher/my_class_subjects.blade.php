@extends('layout.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Class And Subjects </h1>
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
                <h3 class="card-title">My Class And Subjects</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0 " style="overflow: auto;">
                <table class="table table-striped " style="font-size: 0.85rem;">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Class Name </th>
                      <th>Subject Name </th>
                      <th>Subject Type </th>
                      <th>Created Date</th>
                      <th style="text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>


                  @foreach($getRecord as $value)
                    <tr>
                      <td>{{ $value->id}}</td>
                      <td>{{ $value->class_name}}</td>
                      <td>{{ $value->subject}} </td>
                      <td> {{ $value->subject_type}} </td>
                      <!-- <td> </td> -->
                      <td>{{ date('d-m-Y H:i A ', strtotime($value->created_at))}}</td>
                      <td style="text-align: center;">
                    <a href="{{ url('admin/subject/edit', $value->id)}}" class="btn btn-primary">Edit</a>
                    <a href="{{ url('admin/subject/delete', $value->id)}}" class="btn btn-danger">Delete</a>
                    </td>
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