@extends('layout.app')

@section('content')

<main class="app-main"> <!--begin::App Content Header-->
    <div class="col-md-12"> <!--begin::Quick Example-->
        <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Edit Teacher</div>
            </div> <!--end::Header--> <!--begin::Form-->
            <form action="" method="post" enctype="multipart/form-data"> <!--begin::Body-->
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">First Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="First Name" required value="{{old('name', $teacher->name)}}">
                            <div style="color: red;">
                                {{$errors->first('name')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Last Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" required value="{{old('last_name', $teacher->last_name)}}">
                            <div style="color: red;">
                                {{$errors->first('last_name')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Gender <span style="color: red;">*</span></label>
                            <select name="gender" id="" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="male" {{old('gender', $teacher->gender) == "male" ? 'selected' : ''}}>Male</option>
                                <option value="female" {{old('gender', $teacher->gender) == "female" ? 'selected' : ''}}>Female</option>
                                <option value="other" {{old('gender', $teacher->gender) == "other" ? 'selected' : ''}}>Other</option>
                            </select>
                            <div style="color: red;">
                                {{$errors->first('gender')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Date Of Birth <span style="color: red;">*</span></label>
                            <input type="date" class="form-control" name="date_of_birth" value="{{old('date_of_birth', $teacher->date_of_birth)}}">
                            <div style="color: red;">
                                {{$errors->first('date_of_birth')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Date Of Joining <span style="color: red;">*</span></label>
                            <input type="date" class="form-control" name="admission_date" value="{{old('admission_date', $teacher->admission_date)}}">
                            <div style="color: red;">
                                {{$errors->first('admission_date')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Mobile Number </label>
                            <input type="text" class="form-control" name="mobile_number" placeholder="Mobile Number" value="{{old('mobile_number', $teacher->mobile_number)}}">
                            <div style="color: red;">
                                {{$errors->first('mobile_number')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Marital Status</label>
                            <input type="text" class="form-control" name="marital_status" placeholder="Marital Status" value="{{old('marital_status', $teacher->marital_status)}}">
                            <div style="color: red;">
                                {{$errors->first('marital_status')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Profile Pic </label>
                            <input type="file" class="form-control" name="profile_pic"">
                            @if (!empty($teacher->profile_pic))
                                <img src="{{asset('upload/profile/' . $teacher->profile_pic)}}" alt="profile_pic" style="width: auto; height: 100px;p">
                            @endif
                            <div style="color: red;">
                                {{$errors->first('profile_pic')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Current Address <span style="color: red;">*</span></label>
                            <textarea type="text" class="form-control" name="current_address" value="{{old('current_address')}}" placeholder="Current Address">{{$teacher->current_address}}</textarea>
                            <div style="color: red;">
                                {{$errors->first('current_address')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Permanent Address </label>
                            <textarea type="text" class="form-control" name="permanent_address" value="{{old('permanent_address', $teacher->permanent_address)}}" placeholder="Permanent Address">{{$teacher->permanent_address}}</textarea>
                            <div style="color: red;">
                                {{$errors->first('permanent_address')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Qualification </label>
                            <textarea type="text" class="form-control" name="qualification" value="{{old('qualification', $teacher->qualification)}}" placeholder="Qualification">{{$teacher->qualification}}</textarea>
                            <div style="color: red;">
                                {{$errors->first('qulification')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Work Experience </label>
                            <textarea type="text" class="form-control" name="work_experience" value="{{old('work_experience', $teacher->work_experience)}}" placeholder="Work Experience">{{$teacher->work_experience}}</textarea>
                            <div style="color: red;">
                                {{$errors->first('work_experience')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Note </label>
                            <textarea type="text" class="form-control" name="note" value="{{old('note', $teacher->note)}}" placeholder="Note">{{$teacher->note}}</textarea>
                            <div style="color: red;">
                                {{$errors->first('note')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Status <span style="color: red;">*</span></label>
                            <select name="status" id="" class="form-control" required>
                                <option value="">Select Status</option>
                                <option value="0" {{old('status', $teacher->status) == "0" ? 'selected' : ''}}>Active</option>
                                <option value="1" {{old('status', $teacher->status) == "1" ? 'selected' : ''}}>Inactive</option>
                            </select>
                            <div style="color: red;">
                                {{$errors->first('status')}}
                            </div>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Email <span style="color: red;">*</span></label>
                        <input type="email" class="form-control" name="email" placeholder="school@school.example" required value="{{old('email', $teacher->email)}}">
                        <div style="color: red;">
                            {{$errors->first('email')}}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password <span style="color: red;">*</span></label>
                        <input type="password" class="form-control" name="password" placeholder="password">
                        <div class="form-text">if you want to update password.</div>
                        <div style="color: red;">
                            {{$errors->first('password')}}
                        </div>
                    </div>
                <div class="card-footer"> <button type="submit" class="btn btn-primary">Update</button> </div> <!--end::Footer-->
            </form> <!--end::Form-->
        </div> <!--end::Quick Example--> <!--begin::Input Group-->
    </div>
</main> <!--end::App Main-->

@endsection
