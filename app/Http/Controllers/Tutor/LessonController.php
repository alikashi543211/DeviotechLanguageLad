<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TutorLesson;
use App\Models\TutorLessonPackage;

class LessonController extends Controller
{
    public function list()
    {
        $lesson_list = auth_user()->tutor_lessons;
        return view("tutor.lesson.list", get_defined_vars());
    }

    public function add()
    {
        return view("tutor.lesson.add", get_defined_vars());
    }

    public function save(Request $req)
    {
        $messages = [
            'title.required' => 'Enter title',
            'description.required' => 'Enter description',
            'language.required' => 'Select language',
            'level_from.required' => 'Select level from',
            'level_to.required' => 'Select level to',
            'category.required' => 'Select category',
            'tag.required' => 'Select tag',
        ];

        $rules = [
            'title' => ['required'],
            'description' => ['required'],
            'language' => ['required'],
            'level_from' => ['required'],
            'level_to' => ['required'],
            'category' => ['required'],
            'tag' => ['required'],
        ];

        $this->validate($req, $rules, $messages);

        $tutor = auth()->user();

        if(isset($req->id))
        {
            $tutor_lesson = TutorLesson::find($req->id);
            TutorLesson::where('id', $req->id)->update([
                'tutor_id' => $tutor->id, 
                'title' => $req->title,
                'description' => $req->description,
                'language' => $req->language,
                'level_from' => $req->level_from,
                'level_to' => $req->level_to,
                'category' => $req->category,
                'tag' => $req->tag,
            ]);
        }else{
            $tutor_lesson = TutorLesson::create([
                'tutor_id' => $tutor->id, 
                'title' => $req->title,
                'description' => $req->description,
                'language' => $req->language,
                'level_from' => $req->level_from,
                'level_to' => $req->level_to,
                'category' => $req->category,
                'tag' => $req->tag,
            ]);
        }
        

        for($k = 0; $k < 3; $k++)
        {
            $t_package = TutorLessonPackage::where('tutor_lesson_id', $tutor_lesson->id)
                ->where('package_number', $k+1)
                ->first();
            if(isset($req->status[$k]))
            {
                $status = true;
            }else{
                $status = false;
            }
            if(is_null($t_package))
            {
                
                // dd("Creating");
                TutorLessonPackage::create([
                    'tutor_id' => $tutor->id,
                    'tutor_lesson_id' => $tutor_lesson->id,
                    'status' => $status,
                    'interval' => $req->interval[$k] ?? null,
                    'amount_per_interval' => $req->amount_per_interval[$k] ?? null,
                    'package' => $req->package[$k] ?? null,
                    'total_amount' => $req->total_amount[$k] ?? null,
                    'package_number' => $k+1,
                ]); 
            }else{
                TutorLessonPackage::where('id', $t_package->id)
                    ->update([
                        'status' => $status,
                        'interval' => $req->interval[$k] ?? null,
                        'amount_per_interval' => $req->amount_per_interval[$k] ?? null,
                        'package' => $req->package[$k] ?? null,
                        'total_amount' => $req->total_amount[$k] ?? null
                    ]);
            }
            
        }

        return redirect()->route('tutor.lesson.list')->with("success", "Lesson Saved Successfully!");
        
    }

    public function edit($id = null)
    {
        $tutor_lesson = TutorLesson::findOrFail($id);
        return view("tutor.lesson.edit", get_defined_vars());
    }

    public function change_status($id = null)
    {
        $lesson = TutorLesson::findOrFail($id);
        if($lesson->availability)
        {
            $lesson->availability = false;
        }else{
            $lesson->availability = true;
        }
        
        $lesson->save();
        
        return back()->with("success", "Status Updated Successfully");
    }

    public function delete($id = null)
    {
        $tutor_lesson = TutorLesson::findOrFail($id);
        $student_packages = $tutor_lesson->student_packageS()->count();
        if($student_packages > 0)
        {
            return back()->with("error", "You Can Not Delete Lesson Because Student Have Purchased Your Lesson");  
        }
        $tutor_lesson->delete();
        return back()->with("success", "Lesson Deleted Successfully!");
    }

    public function detail($id = null)
    {
        $lesson = TutorLesson::findOrFail($id);
        $packages = $lesson->tutor_lesson_packages;
        return view("ajax.tutor.lesson.detail", get_defined_vars());
    }
}
