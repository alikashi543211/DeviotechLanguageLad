<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function list()
    {
        $list = Testimonial::all();
        return view("admin.testimonial.list",get_defined_vars());
    }

    public function add()
    {
        return view("admin.testimonial.add");
    }

    public function edit(Request $req)
    {
        $item = Testimonial::find($req->id);
        return view("admin.testimonial.edit",get_defined_vars());
    }

    public function save(Request $req)
    {
        $messages = [
            'image.mimes' => 'Select valid image file',
            'description.required' => 'Enter description here'
        ];

        $rules = [
            'image' => ['mimes:jpeg,jpg,png', 'max:2048'],
            'description' => ['required'],
        ];
        $this->validate($req,$rules,$messages);

        if(isset($req->image))
        {
            $image = uploadFile($req->image, 'uploads/admin/'.uniqid(), 'testimonial-user');
        }

        if(isset($req->id))
        {
            $old = Testimonial::where('id',$req->id)->first();
            Testimonial::where('id',$req->id)->update([
                'image' => $image ?? $old->image ?? null,
                'description' => $req->description
            ]);
            
        }else
        {
            Testimonial::create([
                'image' => $image ?? null,
                'description' => $req->description
            ]);
        }
        return redirect()->route('admin.testimonial.list')->with("success", "Saved successfully");
    }

    public function delete(Request $req)
    {
        Testimonial::find($req->id)->delete();
        return back()->with("success", "Deleted successfully");
    }
}
