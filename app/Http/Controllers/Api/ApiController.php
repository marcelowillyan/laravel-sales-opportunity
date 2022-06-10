<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OpportunityRequest;
use App\Models\Opportunity;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ApiController extends Controller
{
	public function index()
    {
        $seller = $_GET['seller'] ?? '';
        $date = $_GET['date'] ?? '';
        if(isset($date) && !empty($date)):
            $newDate = \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
        else:
            $newDate = '';
        endif;

        if(isset($seller) && !empty($seller) || isset($date) && !empty($date) ) {
            $opportunitys = Opportunity::where('seller', 'LIKE', '%'.$seller.'%')->where('created_at', 'LIKE', '%'.$newDate.'%')->orderBy('created_at', 'desc')->paginate(10);
        } else {
            $opportunitys = Opportunity::orderBy('created_at', 'desc')->paginate(10);
        }

    	return $opportunitys;
    }
}