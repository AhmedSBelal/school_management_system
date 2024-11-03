@extends('layout.app')

@section('content')

<main class="app-main"> <!--begin::App Content Header-->
    <div class="col-md-12"> <!--begin::Quick Example-->
        <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Add New Studnet</div>
            </div> <!--end::Header--> <!--begin::Form-->
            <form action="" method="post" enctype="multipart/form-data"> <!--begin::Body-->
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">First Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="First Name" required value="{{old('name')}}">
                            <div style="color: red;">
                                {{$errors->first('name')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Last Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" required value="{{old('last_name')}}">
                            <div style="color: red;">
                                {{$errors->first('last_name')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Admission Number <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="admission_number" placeholder="Admission Number" required value="{{old('admission_number')}}">
                            <div style="color: red;">
                                {{$errors->first('admission_number')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Roll Number </label>
                            <input type="text" class="form-control" name="roll_number" placeholder="Roll Number" value="{{old('roll_number')}}">
                            <div style="color: red;">
                                {{$errors->first('roll_number')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Class <span style="color: red;">*</span></label>
                            <select name="class_id" id="" class="form-control" required>
                                <option value="">Select Class</option>
                                @foreach ($classes as $class)
                                    <option value="{{$class->id}}" {{old('class_id') == $class->id ? 'selected' : ''}}>{{$class->name}}</option>
                                @endforeach
                            </select>
                            <div style="color: red;">
                                {{$errors->first('class_id')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Gender <span style="color: red;">*</span></label>
                            <select name="gender" id="" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="male" {{old('gender') == "male" ? 'selected' : ''}}>Male</option>
                                <option value="female" {{old('gender') == "female" ? 'selected' : ''}}>Female</option>
                                <option value="other" {{old('gender') == "other" ? 'selected' : ''}}>Other</option>
                            </select>
                            <div style="color: red;">
                                {{$errors->first('gender')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Date Of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth" value="{{old('date_of_birth')}}">
                            <div style="color: red;">
                                {{$errors->first('date_of_birth')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Caste </label>
                            <input type="text" class="form-control" name="caste" placeholder="Caste" value="{{old('caste')}}">
                            <div style="color: red;">
                                {{$errors->first('caste')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Religion </label>
                            <input type="text" class="form-control" name="religion" placeholder="Religion" value="{{old('religion')}}">
                            <div style="color: red;">
                                {{$errors->first('religion')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Mobile Number </label>
                            <input type="text" class="form-control" name="mobile_number" placeholder="Mobile Number" value="{{old('mobile_number')}}">
                            <div style="color: red;">
                                {{$errors->first('mobile_number')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Admission Date <span style="color: red;">*</span></label>
                            <input type="date" class="form-control" name="admission_date" required value="{{old('admission_date')}}">
                            <div style="color: red;">
                                {{$errors->first('admission_date')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Profile Pic </label>
                            <input type="file" class="form-control" name="profile_pic"">
                            <div style="color: red;">
                                {{$errors->first('profile_pic')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Blood Group </label>
                            <input type="text" class="form-control" name="blood_group" value="{{old('blood_group')}}" placeholder="Blood Group">
                            <div style="color: red;">
                                {{$errors->first('blood_group')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Height </label>
                            <input type="text" class="form-control" name="height" value="{{old('height')}}" placeholder="Height">
                            <div style="color: red;">
                                {{$errors->first('height')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Weight </label>
                            <input type="text" class="form-control" name="weight" value="{{old('weight')}}" placeholder="Weight">
                            <div style="color: red;">
                                {{$errors->first('weight')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Status <span style="color: red;">*</span></label>
                            <select name="status" id="" class="form-control" required>
                                <option value="">Select Status</option>
                                <option value="0" {{old('status') == "0" ? 'selected' : ''}}>Active</option>
                                <option value="1" {{old('status') == "1" ? 'selected' : ''}}>Inactive</option>
                            </select>
                            <div style="color: red;">
                                {{$errors->first('status')}}
                            </div>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Email <span style="color: red;">*</span></label>
                        <input type="email" class="form-control" name="email" placeholder="school@school.example" required value="{{old('email')}}">
                        <div style="color: red;">
                            {{$errors->first('email')}}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password <span style="color: red;">*</span></label>
                        <input type="password" class="form-control" name="password" placeholder="password" required>
                        <div style="color: red;">
                            {{$errors->first('password')}}
                        </div>
                    </div>
                <div class="card-footer"> <button type="submit" class="btn btn-primary">Submit</button> </div> <!--end::Footer-->
            </form> <!--end::Form-->
        </div> <!--end::Quick Example--> <!--begin::Input Group-->
    </div>
</main> <!--end::App Main-->

@endsection
