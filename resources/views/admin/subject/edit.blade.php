@extends('layout.app')

@section('content')

<main class="app-main"> <!--begin::App Content Header-->
    <div class="col-md-12"> <!--begin::Quick Example-->
        <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Edit Subject</div>
            </div> <!--end::Header--> <!--begin::Form-->
            <form action="" method="post"> <!--begin::Body-->
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Subject Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" required value="{{$subject->name}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <select name="type" class="form-control">
                            <option {{$subject->type == "Theory" ? 'selected' : ''}} value="Theory">Theory</option>
                            <option {{$subject->type == "Practical" ? 'selected' : ''}} value="Practical">Practical</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option {{$subject->status == 0 ? 'selected' : ''}} value="0">Active</option>
                            <option {{$subject->status == 1 ? 'selected' : ''}} value="1">Inactive</option>
                        </select>
                    </div>
                <div class="card-footer"> <button type="submit" class="btn btn-primary">Update</button> </div> <!--end::Footer-->
            </form> <!--end::Form-->
        </div> <!--end::Quick Example--> <!--begin::Input Group-->
    </div>
</main> <!--end::App Main-->

@endsection
