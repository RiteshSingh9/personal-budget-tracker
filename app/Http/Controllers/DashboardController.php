<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    /**
      * Create a new resource.
      *
      * @return \Illuminate\Contracts\View\View
      */
    public function create() {
        $transactions = Auth::user()->transactions()->with('category')->get();

        $income = $transactions->where('type', 'income')->sum('amount');
        $expense = $transactions->where('type', 'expense')->sum('amount');

        $categories = Auth::user()->categories()->with('transactions')->get();
        $categoryData = $categories->mapWithKeys(function ($category) {
            return [$category->name => $category->transactions->sum('amount')];
        });
        return view('dashboard',  compact('income', 'expense', 'categoryData'));
    }
}
