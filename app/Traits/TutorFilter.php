<?php

namespace App\Traits;

use Carbon\Carbon;
use App\Models\TutorProfile;

trait TutorFilter{
  
	public function sortingFilter($tutor_list, $req)
	{
		if(isset($req->sort_by))
		{

	        if($req->sort_by == 'old')
	        {
	            $tutor_list = $tutor_list->orderBy('id', 'asc');
	        }elseif($req->sort_by == 'high-to-low')
	        {
	            $tutor_list = $tutor_list->orderBy(TutorProfile::select('hourly_rate')->whereColumn('users.id', 'tutor_profiles.user_id'), 'desc');
	             
	        }elseif($req->sort_by == 'low-to-high')
	        {
	            $tutor_list = $tutor_list->orderBy(TutorProfile::select('hourly_rate')->whereColumn('users.id', 'tutor_profiles.user_id'));
	        }else
	        {
	            $tutor_list = $tutor_list->orderBy('id', 'desc');
	        }
		}
        return $tutor_list;
		
	}

	public function rightFilter($tutor_list, $req)
	{
		if(isset($req->filter))
		{
			if(isset($req->language))
		    {
		        $tutor_list = $tutor_list->whereHas('tutor_lessons', function($q) use($req){
		            $q->where('language', $req->language);
		        });
		    }

		    if(isset($req->min_price) && isset($req->max_price))
		    {
		        $tutor_list = $tutor_list->whereHas('tutor_profile', function($q) use($req){
		            $q->where('hourly_rate', '>=' ,$req->min_price)->where('hourly_rate', '<=' ,$req->max_price);
		        });
		    }

		    if(isset($req->country))
		    {
		        $tutor_list = $tutor_list->whereHas('tutor_profile', function($q) use($req){
		            $q->where('country', $req->country);
		        });
		    }

		    if(isset($req->level))
		    {
		        $tutor_list = $tutor_list->whereHas('tutor_speaks', function($q) use($req){
		            $q->where('language', $req->level)
		            	->where('language', '!=', null);
		        });
		    }

		    if(isset($req->class))
		    {
		        $tutor_list = $tutor_list->whereHas('tutor_lessons', function($q) use($req){
		            $q->where('category', $req->class);
		        });
		    }
		}
		if(isset($req->sort_by))
		{
			return $tutor_list;
			
        }

        return $tutor_list->orderBy('id', 'desc');
	    
	}
}