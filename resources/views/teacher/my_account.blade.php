@extends('layout.app')

@section('content')

<main class="app-main"> <!--begin::App Content Header-->
    <div class="col-md-12"> <!--begin::Quick Example-->
        <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">My Account</div>
            </div> <!--end::Header--> <!--begin::Form-->
            @include('messages')
            <form action="" method="post" enctype="multipart/form-data"> <!--begin::Body-->
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">First Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="First Name" required value="{{old('name', $user->name)}}">
                            <div style="color: red;">
                                {{$errors->first('name')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Last Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" required value="{{old('last_name', $user->last_name)}}">
                            <div style="color: red;">
                                {{$errors->first('last_name')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Gender <span style="color: red;">*</span></label>
                            <select name="gender" id="" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="male" {{old('gender', $user->gender) == "male" ? 'selected' : ''}}>Male</option>
                                <option value="female" {{old('gender', $user->gender) == "female" ? 'selected' : ''}}>Female</option>
                                <option value="other" {{old('gender', $user->gender) == "other" ? 'selected' : ''}}>Other</option>
                            </select>
                            <div style="color: red;">
                                {{$errors->first('gender')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Date Of Birth <span style="color: red;">*</span></label>
                            <input type="date" class="form-control" name="date_of_birth" value="{{old('date_of_birth', $user->date_of_birth)}}">
                            <div style="color: red;">
                                {{$errors->first('date_of_birth')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Mobile Number </label>
                            <input type="text" class="form-control" name="mobile_number" placeholder="Mobile Number" value="{{old('mobile_number', $user->mobile_number)}}">
                            <div style="color: red;">
                                {{$errors->first('mobile_number')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Marital Status</label>
                            <input type="text" class="form-control" name="marital_status" placeholder="Marital Status" value="{{old('marital_status', $user->marital_status)}}">
                            <div style="color: red;">
                                {{$errors->first('marital_status')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Profile Pic </label>
                            <input type="file" class="form-control" name="profile_pic"">
                            @if (!empty($user->profile_pic))
                                <img src="{{asset('upload/profile/' . $user->profile_pic)}}" alt="profile_pic" style="width: auto; height: 100px;p">
                            @endif
                            <div style="color: red;">
                                {{$errors->first('profile_pic')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Current Address <span style="color: red;">*</span></label>
                            <textarea type="text" class="form-control" name="current_address" value="{{old('current_address')}}" placeholder="Current Address">{{$user->current_address}}</textarea>
                            <div style="color: red;">
                                {{$errors->first('current_address')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Permanent Address </label>
                            <textarea type="text" class="form-control" name="permanent_address" value="{{old('permanent_address', $user->permanent_address)}}" placeholder="Permanent Address">{{$user->permanent_address}}</textarea>
                            <div style="color: red;">
                                {{$errors->first('permanent_address')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Qualification </label>
                            <textarea type="text" class="form-control" name="qualification" value="{{old('qualification', $user->qualification)}}" placeholder="Qualification">{{$user->qualification}}</textarea>
                            <div style="color: red;">
                                {{$errors->first('qulification')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Work Experience </label>
                            <textarea type="text" class="form-control" name="work_experience" value="{{old('work_experience', $user->work_experience)}}" placeholder="Work Experience">{{$user->work_experience}}</textarea>
                            <div style="color: red;">
                                {{$errors->first('work_experience')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Note </label>
                            <textarea type="text" class="form-control" name="note" value="{{old('note', $user->note)}}" placeholder="Note">{{$user->note}}</textarea>
                            <div style="color: red;">
                                {{$errors->first('note')}}
                            </div>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Email <span style="color: red;">*</span></label>
                        <input type="email" class="form-control" name="email" placeholder="school@school.example" required value="{{old('email', $user->email)}}">
                        <div style="color: red;">
                            {{$errors->first('email')}}
                        </div>
                    </div>
                <div class="card-footer"> <button type="submit" class="btn btn-primary">Update</button> </div> <!--end::Footer-->
            </form> <!--end::Form-->
        </div> <!--end::Quick Example--> <!--begin::Input Group-->
    </div>
</main> <!--end::App Main-->

@endsection
