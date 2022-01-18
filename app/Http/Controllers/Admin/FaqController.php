<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Faq;

class FaqController extends Controller
{
    public function list()
    {
        $list = Faq::all();
        return view("admin.faq.list", get_defined_vars());
    }

    public function add()
    {
        return view("admin.faq.add");
    }

    public function edit(Request $req)
    {
        $item = Faq::find($req->id);
        return view("admin.faq.edit", get_defined_vars());
    }

    public function save(Request $req)
    {
        $messages = [
            'question.required' => 'Enter question',
            'answer.required' => 'Enter answer',
            'type.required' => 'Enter answer',
        ];

        $rules = [
            'question' => ['required'],
            'answer' => ['required'],
            'type' => ['required'],
        ];
        $this->validate($req, $rules, $messages);

        try
        {
            if(isset($req->id))
            {
                Faq::where('id', $req->id)->update([
                    'question' => $req->question,
                    'answer' => $req->answer,
                    'type' => $req->type
                ]);
                
            }else
            {
                Faq::create([
                    'question' => $req->question,
                    'answer' => $req->answer,
                    'type' => $req->type
                ]);
            }
            return redirect()->route('admin.faq.list')->with("success", "Saved successfully");

        }catch (\Exception $e) {
            return redirect()->route('admin.faq.list')->with('error', $e->getMessage());
        }
    }

    public function delete(Request $req)
    {
        Faq::find($req->id)->delete();

        return back()->with("success", "Deleted successfully");
    }
}
