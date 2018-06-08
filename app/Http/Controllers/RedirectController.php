<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

use App\Models\Redirect as RedirectModel;
use App\Http\Requests\RedirectStoreRequest;

class RedirectController extends Controller
{
    public function add(Request $request)
    {
    	return View::make('index', [
            'urls' => RedirectModel::all()->pluck('from')
        ]);
    }

    public function store(RedirectStoreRequest $request)
    {
        // find a random string that is not used
    	// if dealing with entropy becomes a problem we can generate
    	// a pool of available random strings as a running task
    	while(true)
    	{
    		$from = str_random(8);
    		if(RedirectModel::where('from', $from)->count() == 0)
    			break;
    	}

        $redirect = new RedirectModel([
    		'from' => $from,
    		'to' => $request->json()->get('url')
    	]);

    	$redirect->save();

    	return Response::json($redirect);
    }

    public function get(string $token, Request $request)
    {
        $redirect = RedirectModel::where('from', $token)->first();

        if (!$redirect)
            return response()->json([
                'error' => [
                    'Url not found'
                ]
            ]);

        return Redirect::to($redirect->to, 301);
    }
}
