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
                <h3 class="card-title">Edit Student</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">

              {{ csrf_field() }}
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label >First Name <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="name" value="{{ old('name',$getRecord->name)}}" required placeholder="Enter First Name">
                     <!-- error msg -->
                      <div style="color: red;">{{ $errors->first('name') }} </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label >Last Name <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="last_name" value="{{ old('last_name',$getRecord->last_name)}}" required placeholder="Enter Last Name">
                      <div style="color: red;">{{ $errors->first('last_name') }} </div>
                    
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label >Admission Number <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="admission_number" value="{{ old('admission_number', $getRecord->admission_number)}}"  placeholder="Enter Admission Number">
                      <div style="color: red;">{{ $errors->first('admission_number') }} </div>

                    </div>
                    <div class="form-group col-md-6">
                      <label >Roll Number <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="roll_number" value="{{ old('roll_number',$getRecord->roll_number)}}"  placeholder="Enter Roll Number">
                      <div style="color: red;">{{ $errors->first('roll_number') }} </div>

                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label >Class <span style="color: red;">*</span></label>
                      <select name="class_id"  class="form-control" required>
                        <option value="">select class</option>
                        <!-- Dynamic Data -->
                        @foreach($getClass as $val)
                        <option {{ (old('class_id', $getRecord->class_id) == $val->id)? 'selected' : ''}} value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach
                      </select>
                      <div style="color: red;">{{ $errors->first('class_id') }} </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label >Gender <span style="color: red;">*</span></label>
                      <select name="gender" class="form-control" >
                        <option value="">select Gender</option>
                        <option {{ (old('gender', $getRecord->gender) == 'male')? 'selected' : ''}} value="male">Male</option>
                        <option {{ (old('gender', $getRecord->gender) == 'female')? 'selected' : ''}} value="female">Female</option>
                        <option {{ (old('gender', $getRecord->gender) == 'Other')? 'selected' : ''}} value="Other">Other</option>
                      </select>
                      <div style="color: red;">{{ $errors->first('gender') }} </div>

                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label >Date of Birth <span style="color: red;">*</span></label>
                      <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth', $getRecord->date_of_birth)}}"  placeholder="dd/mm/yyyy">
                      <div style="color: red;">{{ $errors->first('date_of_birth') }} </div>

                    </div>
                    <div class="form-group col-md-6">
                      <label >Caste  <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="caste" value="{{ old('caste',$getRecord->caste)}}"  placeholder="Enter Caste">
                      <div style="color: red;">{{ $errors->first('caste') }} </div>

                    </div>
                  </div>
                 

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label >Religion  <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="religion" value="{{ old('religion', $getRecord->religion)}}"  placeholder="Enter Religion">
                      <div style="color: red;">{{ $errors->first('religion') }} </div>

                    </div>
                    <div class="form-group col-md-6">
                      <label >Mobile Number  <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number', $getRecord->mobile_number)}}"  placeholder="Enter Mobile Number">
                      <div style="color: red;">{{ $errors->first('mobile_number') }} </div>

                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label >Admission Date <span style="color: red;">*</span></label>
                      <input type="date" class="form-control" name="admission_date" value="{{ old('admission_date', $getRecord->admission_date)}}"  placeholder="dd/mm/yyyy">
                      <div style="color: red;">{{ $errors->first('admission_date') }} </div>

                    </div>
                    <div class="form-group col-md-6">
                      <label >Status <span style="color: red;">*</span></label>
                      <select name="status" class="form-control" >
                        <option  value="">select Status</option>
                        <option {{ (old('status', $getRecord->status) == '0')? 'selected' : ''}} value="0">Active</option>
                        <option {{ (old('status', $getRecord->status) == '1')? 'selected' : ''}} value="1">Inactive</option>
                      </select>
                      <div style="color: red;">{{ $errors->first('status') }} </div>

                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label >blood Group  <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="blood_group" value="{{ old('blood_group', $getRecord->blood_group)}}"  placeholder="Enter Blood group">
                      <div style="color: red;">{{ $errors->first('blood_group') }} </div>

                    </div>
                    <div class="form-group col-md-6">
                      <label >Profile Pic  <span style="color: red;">*</span></label>
                      <input type="file" class="form-control" name="profile_pic" value="{{ old('profile_pic')}}"  placeholder="Select file">
                      <div style="color: red;">{{ $errors->first('profile_pic') }} </div>
                      @if(!empty($getRecord->getProfile()))
                        <img src="{{ $getRecord->getProfile() }}" style="width: auto; height:50px; ">
                        @endif
                    </div>
                    </div>
                 

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label > Height  <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="height" value="{{ old('height', $getRecord->height)}}"  placeholder="Enter Height">
                      <div style="color: red;">{{ $errors->first('height') }} </div>

                    </div>
                    <div class="form-group col-md-6">
                      <label>W eight  <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="weight" value="{{ old('weight',  $getRecord->weight)}}"  placeholder="Enter Weight">
                      <div style="color: red;">{{ $errors->first('weight') }} </div>

                    </div>
                  </div>

                
                    <div class="row">

                      <div class="form-group col-md-6">
                        <label >Email address <span style="color: red;">*</span> </label>
                        <input type="email" class="form-control" name="email" value="{{ old('email',  $getRecord->email)}}" required placeholder="Enter email">
                        <div style="color: red;">
                          {{ $errors->first('email') }} 
                        </div>
                      </div>
                        <div class="form-group col-md-6">
                          <label >Password <span style="color: red;">*</span> </label>
                          <input type="password" class="form-control" name="password"  placeholder="Password">
                        </div>
                </div>
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
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