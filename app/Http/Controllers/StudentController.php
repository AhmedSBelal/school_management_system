<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Str;

class StudentController extends Controller
{
    public function list() {
        $data['students'] = User::getstudents(); // pagination
        $data['title'] = 'Student List';
        return view('admin.student.list', $data);
    }

    public function add() {
        $data['title'] = 'Add New Studnet';
        $data['classes'] = ClassModel::getClasses();
        return view('admin.student.add', $data);
    }

    public function store(Request $request) {
        request()->validate([
            'email' => 'required|email|unique:users',
            'height' => 'max:10',
            'weight' => 'max:10',
            'blood_group' => 'max:10',
            'mobile_number' => 'nullable|min:8|max:15',
            'caste' => 'max:50',
            'religion' => 'max:50',
            'admission_number' => 'max:50|required',
            'roll_number' => 'max:50',
            'password' => 'required',
            'name' => 'required',
            'last_name' => 'required',
            'class_id' => 'required',
            'gender' => 'required',
            'admission_date' => 'required',
            'status' => 'required'
        ]);
        $student = new User;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = $request->admission_number;
        $student->roll_number = $request->roll_number;
        $student->class_id = $request->class_id;
        $student->gender = $request->gender;
        $student->caste = $request->caste;
        $student->religion = $request->religion;
        $student->mobile_number = $request->mobile_number;
        $student->blood_group = $request->blood_group;
        $student->height = $request->height;
        $student->weight = $request->weight;
        $student->status = $request->status;
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->role = 3;
        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = $request->date_of_birth;
        }
        if (!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('ymdhis') . Str::random(20);
            $fileName = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $fileName);
            $student->profile_pic = $fileName;
        }
        if (!empty($request->admission_date)) {
            $student->admission_date = $request->admission_date;
        }
        $student->save();
        return redirect('admin/student/list')->with('success','Student Successfully Created');
    }

    public function edit($id) {
        $data['student'] = User::getSingle($id);
        if (empty($data['student'])) {
            return abort(404);
        }
        $data['title'] = "Edit Student";
        $data['classes'] = ClassModel::getClasses();
        return view('admin.student.edit', $data);
    }

    public function update($id, Request $request) {
        request()->validate( [
            'email' => 'required|email|unique:users,email,'.$id,
            'height' => 'max:10',
            'weight' => 'max:10',
            'blood_group' => 'max:10',
            'mobile_number' => 'nullable|min:8|max:15',
            'caste' => 'max:50',
            'religion' => 'max:50',
            'admission_number' => 'max:50|required',
            'roll_number' => 'max:50',
            'name' => 'required',
            'last_name' => 'required',
            'class_id' => 'required',
            'gender' => 'required',
            'admission_date' => 'required',
            'status' => 'required'
        ]);
        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = $request->admission_number;
        $student->roll_number = $request->roll_number;
        $student->class_id = $request->class_id;
        $student->gender = $request->gender;
        $student->caste = $request->caste;
        $student->religion = $request->religion;
        $student->mobile_number = $request->mobile_number;
        $student->blood_group = $request->blood_group;
        $student->height = $request->height;
        $student->weight = $request->weight;
        $student->status = $request->status;
        $student->email = trim($request->email);
        $student->role = 3;
        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = $request->date_of_birth;
        }
        if (!empty($request->file('profile_pic'))) {
            if (!empty($student->profile_pic)) {
                unlink('upload/profile/' . $student->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('ymdhis') . Str::random(20);
            $fileName = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $fileName);
            $student->profile_pic = $fileName;
        }
        if (!empty($request->admission_date)) {
            $student->admission_date = $request->admission_date;
        }
        if (!empty($request->password)) {
            $student->password = Hash::make($request->password);
        }
        $student->save();
        return redirect('admin/student/list')->with('success','Student Successfully Updated');
    }

    public function delete($id) {
        $student = User::getSingle($id);
        if (!empty($student)) {
            $student->is_delete = 1;
            $student->save();
            return redirect()->back()->with('success','Student Successfully Deleted');
        }
        return abort(404);
    }

}
