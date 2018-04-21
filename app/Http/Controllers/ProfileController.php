<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;



class ProfileController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function show($id)
	{
		$user = User::where('id', $id)->first();

		return view('profile.index', compact('user'));
	}

    public function update($id)
    {
        $id = Auth::user()->id;
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'email'      => 'required',
            'monthly_salary' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('profile/' . $id)
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $user = User::where('id', $id)->first();
            $user->name       = Input::get('name');
            $user->email      = Input::get('email');
            $user->monthly_salary = Input::get('monthly_salary');
            $user->save();

            // redirect
            Session::flash('message', 'Successfully updated profile!');
            return Redirect::to('profile/' . $id);
        }
    }
}
