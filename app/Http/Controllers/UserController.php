<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Str;

class UserController extends Controller
{

    public function myAccount() {
        $data['title'] = "My Account";
        $data['user'] = User::getSingle(Auth::user()->id);
        switch (Auth::user()->role) {
            case 1:
                $url = "admin";
            break;
            case 2:
                $url = "teacher";
            break;
            case 3:
                $url = "student";
            break;
            case 4:
                $url = "parent";
            break;
            default:
                return redirect()->back()->with('error', 'not available');
        }
        return view($url. '.my_account', $data);
    }

    public function updateMyAccount(Request $request) {
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'mobile_number' => 'nullable|min:8|max:15',
            'name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'current_address' => 'required',
            'marital_status' => 'nullable|max:50'
        ]);
        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = $request->gender;
        $teacher->email = trim($request->email);
        $teacher->current_address = $request->current_address;
        $teacher->role = 2;
        if (!empty($request->mobile_number)) {
            $teacher->mobile_number = $request->mobile_number;
        }
        if (!empty($request->marital_status)) {
            $teacher->marital_status = $request->marital_status;
        }
        if (!empty($request->work_experience)) {
            $teacher->work_experience = $request->work_experience;
        }
        if (!empty($request->current_address)) {
            $teacher->current_address = $request->current_address;
        }
        if (!empty($request->qualification)) {
            $teacher->qualification = $request->qualification;
        }
        if (!empty($request->permanent_address)) {
            $teacher->address = $request->permanent_address;
        }
        if (!empty($request->date_of_birth)) {
            $teacher->date_of_birth = $request->date_of_birth;
        }
        if (!empty($request->file('profile_pic'))) {
            if (!empty($teacher->profile_pic)) {
                unlink('upload/profile/' . $teacher->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('ymdhis') . Str::random(20);
            $fileName = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $fileName);
            $teacher->profile_pic = $fileName;
        }
        if (!empty($request->admission_date)) {
            $teacher->admission_date = $request->admission_date;
        }
        $teacher->save();
        return redirect()->back()->with('success','Your Account Successfully Updated');
    }

    public function updateMyAccountStudnet(Request $request) {
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'mobile_number' => 'nullable|min:8|max:15',
            'name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'weight' => 'nullable|integer',
            'height' => 'nullable|integer'
        ]);
        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->gender = $request->gender;
        $student->email = trim($request->email);
        $student->date_of_birth = $request->date_of_birth;
        $student->role = 3;
        if (!empty($request->mobile_number)) {
            $student->mobile_number = $request->mobile_number;
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
        if (!empty($request->caste)) {
            $student->caste = $request->caste;
        }
        if (!empty($request->religion)) {
            $student->religion = $request->religion;
        }
        if (!empty($request->blood_group)) {
            $student->blood_group = $request->blood_group;
        }
        if (!empty($request->weight)) {
            $student->weight = $request->weight;
        }
        if (!empty($request->height)) {
            $student->height = $request->height;
        }
        $student->save();
        return redirect()->back()->with('success','Your Account Successfully Updated');
    }

    public function updateMyAccountParent(Request $request) {
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'mobile_number' => 'nullable|min:8|max:15',
            'occupation' => 'nullable|max:255',
            'address' => 'required|max:255',
            'name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
        ]);
        $parent = User::getSingle($id);
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->gender = $request->gender;
        $parent->occupation = $request->occupation;
        $parent->address = $request->address;
        $parent->mobile_number = $request->mobile_number;
        $parent->email = trim($request->email);
        $parent->role = 4;
        if (!empty($request->file('profile_pic'))) {
            if (!empty($parent->profile_pic)) {
                unlink('upload/profile/' . $parent->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('ymdhis') . Str::random(20);
            $fileName = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $fileName);
            $parent->profile_pic = $fileName;
        }
        $parent->save();
        return redirect()->back()->with('success','Account Successfully Updated');
    }

    public function change_password() {
        $data['title'] = 'Change Password';
        return view('profile.change_password', $data);
    }

    public function update_password(Request $request) {
        $user = User::getSingle(Auth::user()->id);
        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', 'Password Successfully Updated.');
        }
        return redirect()->back()->with('error', 'Current Password is not Correct');
    }

}
