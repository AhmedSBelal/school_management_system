<?php

namespace App\Http\Controllers;

use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function list() {
        $data['title'] = "Subject List";
        $data['subjects'] = SubjectModel::getRecords();
        // dd($data['subjects']);
        return view('admin.subject.list', $data);
    }

    public function add() {
        $data['title'] = 'Add New List';
        return view('admin.subject.add', $data);
    }

    public function store(Request $request) {
        $subject = new SubjectModel();
        $subject->name = $request->name;
        $subject->type = $request->type;
        $subject->status = $request->status;
        $subject->created_by = Auth::user()->id;
        $subject->save();
        return redirect('admin/subject/list')->with('success', "Subject Successfully Created");
    }

    public function edit($id) {
        $data['subject'] = SubjectModel::getSingle($id);
        if (empty($data['subject'])) {
            abort(404);
        }
        $data['title'] = "Edit Subjectt";
        return view('admin.subject.edit', $data);
    }

    public function update(Request $request, $id) {
        $subject = SubjectModel::getSingle($id);
        $subject->name = $request->name;
        $subject->type = $request->type;
        $subject->status = $request->status;
        $subject->save();
        return redirect('admin/subject/list')->with('success', 'Subject Successfully Updated.');
    }

    public function delete($id) {
        $class = SubjectModel::getSingle($id);
        $class->is_delete = 1;
        $class->save();
        return redirect()->back()->with('success', 'Subject Successfully Deleted');
    }

}
