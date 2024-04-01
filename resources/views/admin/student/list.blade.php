@extends('layout.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin List (Total: {{ $getRecord->total() }} )</h1>
          </div>
          <div class="col-sm-6 " style="text-align: end;">

            <a href="{{ url('admin/student/add')}}" class="btn btn-primary">Add New Admin</a>
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
                    <label >Admission Number</label>
                    <input type="text" class="form-control" name="admission_number" value="{{ Request::get('admission_number') }}" placeholder="Admission Number">
                  </div>
                  <div class="form-group col-md-2">
                    <label >Roll Number</label>
                    <input type="text" class="form-control" name="roll_number" value="{{ Request::get('roll_number') }}" placeholder="Roll Number">
                  </div>
                  <div class="form-group col-md-2">
                    <label >Class Name</label>
                    <input type="text" class="form-control" name="class_name" value="{{ Request::get('class_name') }}" placeholder="Class Name">
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
                    <label >Caste</label>
                    <input type="text" class="form-control" name="caste" value="{{ Request::get('caste') }}" placeholder="Caste">
                  </div>

                  <div class="form-group col-md-2">
                    <label >Religion</label>
                    <input type="text" class="form-control" name="religion" value="{{ Request::get('religion') }}" placeholder="Religion">
                  </div>
                  <div class="form-group col-md-2">
                    <label >Mobile Number</label>
                    <input type="text" class="form-control" name="mobile_number" value="{{ Request::get('mobile_number') }}" placeholder="Mobile Number">
                  </div>
                  <div class="form-group col-md-2">
                    <label >Blood Group</label>
                    <input type="text" class="form-control" name="blood_group" value="{{ Request::get('blood_group') }}" placeholder="Blood Group">
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
                    <label> Admission Date</label>
                    <input type="date" class="form-control" name="admission_date" value="{{ Request::get('admission_date') }}" >
                  </div>

                  <div class="form-group col-md-2">
                    <label> Created Date</label>
                    <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}" >
                  </div>
                
                <!-- /.card-body -->

                <div class="form-group col-md-3" style="margin-top: 30px;">
                  <button type="search" class="btn btn-primary">Search</button>
                  <a href="{{ url('admin/student/list')}}" class="btn btn-success">Reset</a>
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
                <h3 class="card-title">Student List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0 " style="overflow: auto;">
                <table class="table table-striped " style="font-size: 0.85rem;">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Profile Pic</th>
                      <th>Student Name</th>
                      <th>Parent Name</th>
                      <th>Admission Number</th>
                      <th>Roll Number </th>
                      <th>Class </th>
                      <th>Gender </th>
                      <th>Date of Birth </th>
                      <th>Caste </th>
                      <th>Religion </th>
                      <th>Mobile Number</th>
                      <th>Admission Date </th>
                      <th>Status </th>
                      <th>blood Group</th>
                      <th>Height </th>
                      <th>Weight</th>
                      <th>Email</th>
                      <th>Created Date</th>
                      <th style="text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                    <tr>
                      <td> {{ $value->id}} </td>
                      <td> 
                    @if(!empty($value->getProfile()) )
                      <img src="{{ $value->getProfile() }}" style="width:50px; height:50px; border-radius:50%">
                    @endif
                    </td>
                      <td> {{ $value->name}} {{ $value->last_name}} </td>
                      <td> {{ $value->parent_name}} {{ $value->parent_last_name}} </td>
                      <td> {{ $value->admission_number}}  </td>
                      <td> {{ $value->roll_number}}  </td>
                      <td> {{ $value->class_name}}  </td>
                      <td> {{ $value->gender}}  </td>
                      <td> 
                        @if(!empty($value->date_of_birth))
                        {{ date('d-m-Y', strtotime($value->date_of_birth))}}
                        @endif

                    </td>
                      <td> {{ $value->caste}}  </td>
                      <td> {{ $value->religion}}  </td>
                      <td> {{ $value->mobile_number}}  </td>
                      <td> 
                      @if(!empty($value->admission_date))
                        {{ date('d-m-Y', strtotime($value->admission_date))}}
                        @endif
                    </td>
                      <td> {{ ($value->status == 0)? 'Active': 'Inactive'}}  </td>
                      <td> {{ $value->blood_group}}  </td>
                      <td> {{ $value->height}}  </td>
                      <td> {{ $value->weight}}  </td>
                      <td> {{ $value->email}} </td>
                      <td> 
                      @if(!empty($value->created_at))
                        {{ date('d-m-Y', strtotime($value->created_at))}}
                        @endif
                    </td>
                      <td style="min-width:150px">
                        <a href="{{ url('admin/student/edit', $value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ url('admin/student/delete', $value->id)}}" class="btn btn-danger btn-sm">Delete</a>
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