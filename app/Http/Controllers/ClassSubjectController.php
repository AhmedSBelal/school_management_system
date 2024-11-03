<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassSubjectController extends Controller
{
    public function list() {
        $data['title'] = 'Assign Subject List';
        $data['classesSubjects'] = ClassSubjectModel::getRecords();
        return view('admin.assign_subject.list', $data);
    }

    public function add() {
        $data['title'] = 'Assign New Subject';
        $data['classes'] = ClassModel::getClasses();
        $data['subjects'] = SubjectModel::getSubjects();
        return view('admin.assign_subject.add', $data);
    }

    public function store(Request $request) {

        if (empty($request->class_id)) {
            return redirect()->back()->with('error', 'Due to some error please try again.');
        }

        foreach($request->subject_id as $subject_id) {
            if (empty($subject_id)) {
                return redirect()->back()->with('error', 'Due to some error please try again.');
            }
        }

        foreach ($request->subject_id as $subjectId) {
            $recordIsExist = ClassSubjectModel::isExist($request->class_id, $subjectId);
            if (!empty($recordIsExist)) {
                $recordIsExist->status = $request->status;
                $recordIsExist->save();
            } else {
                $record = new ClassSubjectModel;
                $record->class_id = $request->class_id;
                $record->subject_id = $subjectId;
                $record->status = $request->status;
                $record->created_by = Auth::user()->id;
                $record->save();
            }
        }

        return redirect('admin/assign_subject/list')->with('success', "Subjects Successfully Assign to Class");
    }

    public function edit($id) {
        $record = ClassSubjectModel::getSingle($id);
        if (empty($record)) {
            abort(404);
        }
        $data['record'] = $record;
        $getAssignSubjectId = ClassSubjectModel::getAssignSubjectId($record->class_id);
        foreach($getAssignSubjectId as $id) {
            $data['assignSubject'][$id->subject_id] = 1;
        }
        $data['title'] = 'Edit Assign Subject';
        $data['class'] = ClassModel::where('class.id', $record->class_id)->first();
        $data['subjects'] = SubjectModel::getSubjects();
        return view('admin.assign_subject.edit', $data);
    }

    public function update(Request $request) {
        if (empty($request->class_id)) {
            return redirect()->back()->with('error', 'Due to some error please try again.');
        }

        ClassSubjectModel::deleteSubject($request->class_id);

        if (!empty($request->subject_id)) {
            foreach ($request->subject_id as $subjectId) {
                $recordIsExist = ClassSubjectModel::isExist($request->class_id, $subjectId);
                if (!empty($recordIsExist)) {
                    $recordIsExist->status = $request->status;
                    $recordIsExist->save();
                } else {
                    $record = new ClassSubjectModel;
                    $record->class_id = $request->class_id;
                    $record->subject_id = $subjectId;
                    $record->status = $request->status;
                    $record->created_by = Auth::user()->id;
                    $record->save();
                }
            }
        }

        return redirect('admin/assign_subject/list')->with('success', "Subjects Successfully Edit Assign to Class");

    }

    public function delete($id) {
        $record = ClassSubjectModel::getSingle($id);
        $record->is_delete = 1;
        $record->save();
        return redirect()->back()->with('success', 'Record Successfully Deleted');
    }

    public function edit_single($id) {
        $record = ClassSubjectModel::getSingle($id);
        if (empty($record)) {
            abort(404);
        }
        $data['record'] = $record;
        $data['title'] = 'Edit Assign Subject';
        $data['class'] = ClassModel::where('class.id', $record->class_id)->first();
        $data['subject'] = SubjectModel::where('subject.id', $record->subject_id)->first();
        return view('admin.assign_subject.edit_single', $data);
    }

    public function update_single(Request $request) {
        if (empty($request->class_id)) {
            return redirect()->back()->with('error', 'Due to some error please try again.');
        } else if (empty($request->subject_id)) {
            if (empty($request->temp_subject_id)) {
                redirect()->back()->with('error', 'Due to some error please try again.');
            }
            ClassSubjectModel::deleteSingleSubject($request->class_id, $request->temp_subject_id);
        } else {
            $record = ClassSubjectModel::where('class_id', $request->class_id)->where('subject_id', $request->subject_id)->first();
            $record->status = $request->status;
            $record->save();
        }
        return redirect('admin/assign_subject/list')->with('success', "Subjects Successfully Edit Assign to Class");
    }

}
