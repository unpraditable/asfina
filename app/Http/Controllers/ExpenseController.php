<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Article;
use App\ArticleCategory;
use App\Allocation;

use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;

class ExpenseController extends Controller {

    public function index($user_id, $type)
    {
        $allocation = Allocation::where('user_id', $user_id)->first();

        $expenses = Expense::where('user_id', $user_id)->where('type', $type)->get();
        $sumExpenses = $expenses->sum('amount');
        
        $remainingAllocation = 0;
        if($type == 'productivity'){
            $remainingAllocation = $allocation->productivity - $sumExpenses;
        }
        
        if($type == 'investments'){
            $remainingAllocation = $allocation->investments - $sumExpenses;
        }
        
        if($type == 'savings'){
            $remainingAllocation = $allocation->savings - $sumExpenses;
        }
        
        if($type == 'charities'){
            $remainingAllocation = $allocation->charities - $sumExpenses;
        }
        
		return view('expense.index', compact(['expenses', 'type', 'sumExpenses', 'remainingAllocation']));
    }
    
    public function create($user_id, $type)
    {
        // load the create form (app/views/nerds/create.blade.php)
        return view('expense.create', compact(['user_id', 'type']));
    }

    
    public function show($user_id, $type, $id)
	{
		$expense = Expense::where('user_id', $user_id)->where('type', $type)->where('id', $id)->first();

		return view('expense.detail', compact(['expense', 'type']));
	}
    
    public function suggestions($user_id, $type)
	{
        $allocation = Allocation::where('user_id', $user_id)->first();

        $expenses = Expense::where('user_id', $user_id)->where('type', $type)->get();
        $sumExpenses = $expenses->sum('amount');
        
        $remainingAllocation = 0;
        if($type == 'productivity'){
            $remainingAllocation = $allocation->productivity - $sumExpenses;
        }
        
        if($type == 'investments'){
            $remainingAllocation = $allocation->investments - $sumExpenses;
        }
        
        if($type == 'savings'){
            $remainingAllocation = $allocation->savings - $sumExpenses;
        }
        
        if($type == 'charities'){
            $remainingAllocation = $allocation->charities - $sumExpenses;
        }
        
        $articleCategory = ArticleCategory::where('title', $type)->first();
        
        $suggestions = Article::where('article_category_id', $articleCategory->id)->get();

		return view('expense.suggestions', compact(['suggestions', 'type', 'sumExpenses', 'remainingAllocation']));
	}
    
    public function suggestion($user_id, $type, $id)
	{
        $articleCategory = ArticleCategory::where('title', $type)->first();

		$suggestion = Article::where('article_category_id', $articleCategory->id)->where('id', $id)->first();

		return view('expense.suggestion-detail', compact(['suggestion', 'type']));
	}
    
    public function edit($user_id, $type, $id)
    {
        $expense = Expense::where('user_id', $user_id)->where('type', $type)->where('id', $id)->first();

		return view('expense.edit', compact(['user_id', 'expense', 'type']));
    }
    
    public function store($user_id, $type)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'       => 'required',
            'description' => 'required',
            'amount' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('allocation/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $expense = new Expense;
            $expense->user_id = Auth::user()->id;
            $expense->type = $type;
            $expense->title = Input::get('title');
            $expense->description = Input::get('description');
            $expense->amount = Input::get('amount');
            $expense->save();

            // redirect
            Session::flash('message', 'Successfully created expense!');
            return Redirect::to('expense/' . $user_id . '/' . $type );
        }
    }
    
    public function update($user_id, $type ,$id)
    {
//        $user_id = Auth::user()->id;
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'       => 'required',
            'description' => 'required',
            'amount' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('allocation/' . $user_id)
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $expense = Expense::where('user_id', $user_id)->first();
            $expense->user_id = Auth::user()->id;
            $expense->type = $type;
            $expense->title = Input::get('title');
            $expense->description = Input::get('description');
            $expense->amount = Input::get('amount');
            $expense->save();

            // redirect
            Session::flash('message', 'Successfully updated allocation!');
            return Redirect::to('expense/' . $user_id . '/' . $type . '/' . $id);
        }
    }

}