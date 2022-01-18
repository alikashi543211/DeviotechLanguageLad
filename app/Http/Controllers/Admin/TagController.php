<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function list()
    {
        $list = Tag::all();
        return view("admin.tag.list",get_defined_vars());
    }

    public function add()
    {
        return view("admin.tag.add");
    }

    public function edit(Request $req)
    {
        $item = Tag::find($req->id);
        return view("admin.tag.edit",get_defined_vars());
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
            $old = Tag::where('id',$req->id)->first();
            Tag::where('id',$req->id)->update([
                'name' => $req->name
            ]);
            
        }else
        {
            Tag::create([
                'name' => $req->name
            ]);
        }
        return redirect()->route('admin.tag.list')->with("success", "Saved successfully");
    }

    public function delete(Request $req)
    {
        Tag::find($req->id)->delete();
        return back()->with("success", "Deleted successfully");
    }
}
