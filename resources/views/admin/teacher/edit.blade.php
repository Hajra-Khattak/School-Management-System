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
                <h3 class="card-title">Edit Teacher</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">

              {{ csrf_field() }}
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label >First Name <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="name" value="{{ old('name', $getRecord->name )}}" required placeholder="Enter First Name">
                     <!-- error msg -->
                      <div style="color: red;">{{ $errors->first('name') }} </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label >Last Name <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $getRecord->last_name)}}" required placeholder="Enter Last Name">
                      <div style="color: red;">{{ $errors->first('last_name') }} </div>
                    
                    </div>
                  </div>


                  <div class="row">
                    <div class="form-group col-md-6">
                      <label >Date of Birth <span style="color: red;">*</span></label>
                      <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth', $getRecord->date_of_birth)}}"  placeholder="dd/mm/yyyy">
                      <div style="color: red;">{{ $errors->first('date_of_birth') }} </div>
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
                      <label > Date of Joining <span style="color: red;">*</span></label>
                      <input type="date" class="form-control" name="admission_date" value="{{ old('admission_date', $getRecord->admission_date )}}"  placeholder="dd/mm/yyyy">
                      <div style="color: red;">{{ $errors->first('admission_date') }} </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label >Mobile Number  <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number', $getRecord->mobile_number)}}"  placeholder="Enter Mobile Number">
                      <div style="color: red;">{{ $errors->first('mobile_number') }} </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label >Martial Status   <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="martial_status" value="{{ old('martial_status', $getRecord->martial_status)}}"  placeholder="Enter Blood group">
                      <div style="color: red;">{{ $errors->first('martial_status') }} </div>

                    </div>
                    <div class="form-group col-md-6">
                      <label >Profile Pic  <span style="color: red;">*</span></label>
                      <input type="file" class="form-control" name="profile_pic" value="{{ old('profile_pic')}}"  placeholder="Select file">
                      <div style="color: red;">{{ $errors->first('profile_pic') }} </div>
                      @if(!empty($getRecord->getTeacherProfile()))
                        <img src="{{ $getRecord->getTeacherProfile() }}" style="width: auto; height:50px; ">
                      @endif
                  </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label > Current Address  <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="address" value="{{ old('address', $getRecord->address)}}"  placeholder="Enter address">
                      <div style="color: red;">{{ $errors->first('address') }} </div>
                    </div>
                    
                    <div class="form-group col-md-6">
                      <label>Parmanent Address  <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="permanent_address" value="{{ old('permanent_address', $getRecord->permanent_address)}}"  placeholder="Enter permanent Address">
                      <div style="color: red;">{{ $errors->first('permanent_address') }} </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label> Qualification <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="qualification" value="{{ old('qualification', $getRecord->qualification)}}"  placeholder="Enter qualification">
                      <div style="color: red;">{{ $errors->first('qualification') }} </div>
                    </div>

                    <div class="form-group col-md-6">
                      <label> Work Experience  <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="work_experience" value="{{ old('work_experience',$getRecord->work_experience)}}"  placeholder="Enter work_experience">
                      <div style="color: red;">{{ $errors->first('work_experience') }} </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label >Status <span style="color: red;">*</span></label>
                      <select name="status" class="form-control" >
                        <option  value="">select Status</option>
                        <option {{ (old('status', $getRecord->status) == '0')? 'selected' : ''}} value="0">Active</option>
                        <option {{ (old('status', $getRecord->status) == '1')? 'selected' : ''}} value="1">Inactive</option>
                      </select>
                      <div style="color: red;">{{ $errors->first('status') }} </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label> Note  <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="note" value="{{ old('note', $getRecord->note)}}"  placeholder="Enter note">
                      <div style="color: red;">{{ $errors->first('note') }} </div>
                    </div>
                  </div>


                      <div class="row">
                        <div class="form-group col-md-6">
                          <label >Email address <span style="color: red;">*</span> </label>
                          <input type="email" class="form-control" name="email" value="{{ old('email', $getRecord->email)}}" required placeholder="Enter email">
                          <div style="color: red;">
                            {{ $errors->first('email') }} </div>
                        </div>
                  <div class="form-group col-md-6">
                    <label >Password <span style="color: red;">*</span> </label>
                    <input type="password" class="form-control" name="password"  placeholder="Password">
                  </div>
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