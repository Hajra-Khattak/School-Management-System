@extends('layout.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parent </h1>
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
                <h3 class="card-title">Edit Parent</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">

              {{ csrf_field() }}
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label >First Name <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="name" value="{{ old('name', $getRecord->name)}}" required placeholder="Enter First Name">
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
                      <label >Gender <span style="color: red;">*</span></label>
                      <select name="gender" class="form-control" >
                        <option value="">Select &nbsp; Gender</option>
                        <option {{ (old('gender', $getRecord->gender) == 'male')? 'selected' : ''}} value="male">Male</option>
                        <option {{ (old('gender', $getRecord->gender) == 'female')? 'selected' : ''}} value="female">Female</option>
                        <option {{ (old('gender', $getRecord->gender) == 'Other')? 'selected' : ''}} value="Other">Other</option>
                      </select>
                      <div style="color: red;">{{ $errors->first('gender') }} </div>

                    </div>
                    <div class="form-group col-md-6">
                      <label >Mobile Number  <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number', $getRecord->mobile_number)}}"  placeholder="Enter Mobile Number">
                      <div style="color: red;">{{ $errors->first('mobile_number') }} </div>

                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label >Occupation <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="occupation" value="{{ old('occupation', $getRecord->occupation)}}"  placeholder="Enter Occupation">
                      <div style="color: red;">{{ $errors->first('occupation') }} </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label >Address  <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="address" value="{{ old('address', $getRecord->address)}}"  placeholder="Enter address">
                      <div style="color: red;">{{ $errors->first('address') }} </div>

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
                      <label >Profile Pic  <span style="color: red;">*</span></label>
                      <input type="file" class="form-control" name="profile_pic" value="{{ old('profile_pic')}}"  placeholder="Select file">
                      <div style="color: red;">{{ $errors->first('profile_pic') }} </div>
                      @if(!empty($getRecord->getParentProfile()))
                        <img src="{{ $getRecord->getParentProfile() }}" style="width: auto; height:50px; ">
                     @endif
                      
                  </div>
                  </div>

               
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection