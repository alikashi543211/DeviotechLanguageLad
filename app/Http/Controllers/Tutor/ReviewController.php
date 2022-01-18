<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TutorReview;


class ReviewController extends Controller
{
    public function list()
    {
        $list = TutorReview::where('tutor_id', auth()->user()->id)
            ->get();
        return view("tutor.review.list", get_defined_vars());
    }

    public function delete($id = null)
    {
        $item = TutorReview::findOrFail($id);
        $item->delete();
        return back()->with("success", "Review Deleted Successfully");
    }
      
}
