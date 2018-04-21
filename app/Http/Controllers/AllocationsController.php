<?php

namespace App\Http\Controllers;

use App\Allocation;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;

class AllocationsController extends Controller {

    public function index()
    {
        return view('allocation.index');
    }
    
    public function create()
    {
        // load the create form (app/views/nerds/create.blade.php)
        return view('allocation.create');
    }

    
    public function show($user_id)
	{
		$allocation = Allocation::where('user_id', $user_id)->first();

		return view('allocation.index', compact('allocation'));
	}
    
    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'productivity'       => 'required',
            'investments'      => 'required',
            'savings' => 'required',
            'charities' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('allocation/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $allocation = new Allocation;
            $allocation->user_id = Auth::user()->id;
            $allocation->productivity       = Input::get('productivity');
            $allocation->investments      = Input::get('investments');
            $allocation->savings = Input::get('savings');
            $allocation->charities = Input::get('charities');
            $allocation->save();

            // redirect
            Session::flash('message', 'Successfully created allocation!');
            return Redirect::to('home');
        }
    }
    
    public function update($user_id)
    {
        $user_id = Auth::user()->id;
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'productivity'       => 'required',
            'investments'      => 'required',
            'savings' => 'required',
            'charities' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('allocation/' . $user_id)
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $allocation = Allocation::where('user_id', $user_id)->first();
            $allocation->productivity       = Input::get('productivity');
            $allocation->investments      = Input::get('investments');
            $allocation->savings = Input::get('savings');
            $allocation->charities = Input::get('charities');
            $allocation->save();

            // redirect
            Session::flash('message', 'Successfully updated allocation!');
            return Redirect::to('allocation/' . $user_id);
        }
    }

}