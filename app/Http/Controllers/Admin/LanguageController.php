<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{
    public function list()
    {
        $list = Language::all();
        return view("admin.language.list",get_defined_vars());
    }

    public function add()
    {
        return view("admin.language.add");
    }

    public function edit(Request $req)
    {
        $item = Language::find($req->id);
        return view("admin.language.edit",get_defined_vars());
    }

    public function save(Request $req)
    {
        $messages = [
            'name.required' => 'Enter name here'
        ];

        $rules = [
            'name' => ['required'],
        ];
        $this->validate($req,$rules,$messages);


        if(isset($req->id))
        {
            $old = Language::where('id',$req->id)->first();
            Language::where('id',$req->id)->update([
                'name' => $req->name
            ]);
            
        }else
        {
            Language::create([
                'name' => $req->name
            ]);
        }
        return redirect()->route('admin.language.list')->with("success", "Saved successfully");
    }

    public function delete(Request $req)
    {
        Language::find($req->id)->delete();
        return back()->with("success", "Deleted successfully");
    }
}
