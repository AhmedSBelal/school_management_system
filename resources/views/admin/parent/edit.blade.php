@extends('layout.app')

@section('content')

<main class="app-main"> <!--begin::App Content Header-->
    <div class="col-md-12"> <!--begin::Quick Example-->
        <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Edit Parent</div>
            </div> <!--end::Header--> <!--begin::Form-->
            <form action="" method="post" enctype="multipart/form-data"> <!--begin::Body-->
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">First Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="First Name" required value="{{old('name', $parent->name)}}">
                            <div style="color: red;">
                                {{$errors->first('name')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Last Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" required value="{{old('last_name', $parent->last_name)}}">
                            <div style="color: red;">
                                {{$errors->first('last_name')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Gender <span style="color: red;">*</span></label>
                            <select name="gender" id="" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="male" {{old('gender', $parent->gender) == "male" ? 'selected' : ''}}>Male</option>
                                <option value="female" {{old('gender', $parent->gender) == "female" ? 'selected' : ''}}>Female</option>
                                <option value="other" {{old('gender', $parent->gender) == "other" ? 'selected' : ''}}>Other</option>
                            </select>
                            <div style="color: red;">
                                {{$errors->first('gender')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Occupation </label>
                            <input type="text" class="form-control" name="occupation" placeholder="Occupation" value="{{old('occupation', $parent->occupation)}}">
                            <div style="color: red;">
                                {{$errors->first('occupation')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Mobile Number </label>
                            <input type="text" class="form-control" name="mobile_number" placeholder="Mobile Number" value="{{old('mobile_number', $parent->mobile_number)}}">
                            <div style="color: red;">
                                {{$errors->first('mobile_number')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Address <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="address" placeholder="Address" value="{{old('address', $parent->address)}}" required>
                            <div style="color: red;">
                                {{$errors->first('address')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Profile Pic </label>
                            <input type="file" class="form-control" name="profile_pic"">
                            @if (!empty($parent->profile_pic))
                                <img src="{{asset('upload/profile/' . $parent->profile_pic)}}" alt="profile_pic" style="width: auto; height: 100px;p">
                            @endif
                            <div style="color: red;">
                                {{$errors->first('profile_pic')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Status <span style="color: red;">*</span></label>
                            <select name="status" id="" class="form-control" required>
                                <option value="">Select Status</option>
                                <option value="0" {{old('status', $parent->status) == "0" ? 'selected' : ''}}>Active</option>
                                <option value="1" {{old('status', $parent->status) == "1" ? 'selected' : ''}}>Inactive</option>
                            </select>
                            <div style="color: red;">
                                {{$errors->first('status')}}
                            </div>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Email <span style="color: red;">*</span></label>
                        <input type="email" class="form-control" name="email" placeholder="school@school.example" required value="{{old('email', $parent->email)}}">
                        <div style="color: red;">
                            {{$errors->first('email')}}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
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
