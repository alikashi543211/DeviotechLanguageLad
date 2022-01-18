<?php

namespace App\Traits;

use Carbon\Carbon;

trait DateFilter{
  
	public function dateFilter($list, $req)
	{
		if(isset($req->filter))
		{
			if(isset($req->from_date) && isset($req->to_date))
	        {
	            $list->whereDate('created_at', '>=', Carbon::parse($req->from_date))->whereDate('created_at', '<=', Carbon::parse($req->to_date));
	        }elseif(isset($req->from_date))
	        {
	            $list->whereDate('created_at', '>=', Carbon::parse($req->from_date));
	        }elseif(isset($req->to_date))
	        {
	            $list->whereDate('created_at', '<=', Carbon::parse($req->to_date));
	        }
	        return $list->get();
		}else
		{
			return $list->get();
		}
		
	}

}