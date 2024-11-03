@extends('layout.app')

@section('content')

<main class="app-main"> <!--begin::App Content Header-->
    <div class="col-md-12"> <!--begin::Quick Example-->
        <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Assign New Subject</div>
            </div> <!--end::Header--> <!--begin::Form-->
            <form action="" method="post"> <!--begin::Body-->
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label text-black text-lg font-bold">Class Name</label>
                        <select name="class_id" required class="form-control">
                            <option value="">Select Class</option>
                            @foreach ($classes as $class)
                            <option value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-black text-lg font-bold">Subject Name</label>
                            @foreach ($subjects as $subject)
                            <div>
                                <label for="subject-{{ $subject->id }}" class="flex items-center cursor-pointer">
                                    <!-- Checkbox -->
                                    <input type="checkbox" id="subject-{{ $subject->id }}" value="{{ $subject->id }}" name="subject_id[]"
                                        class="form-checkbox h-5 w-5 text-blue-600 focus:ring-blue-500 transition duration-150 ease-in-out">

                                    <!-- Subject Name -->
                                    <span class="ml-2 text-gray-700 select-none">{{ $subject->name }}</span>
                                </label>
                            </div>
                            @endforeach
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="0">Active</option>
                            <option value="1">Inactive</option>
                        </select>
                    </div>
                <div class="card-footer"> <button type="submit" class="btn btn-primary">Submit</button> </div> <!--end::Footer-->
            </form> <!--end::Form-->
        </div> <!--end::Quick Example--> <!--begin::Input Group-->
    </div>
</main> <!--end::App Main-->

@endsection
