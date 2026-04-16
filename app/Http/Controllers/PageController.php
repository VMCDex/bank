<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{
    public function home()
    {
        $latestProducts = \App\Models\Product::where('is_active', true)
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();

        return view('main', compact('latestProducts'));
    }

    public function private()
    {
        return view('pages.private');
    }

    public function loans()
    {
        $loans = Product::where('type', 'Кредиты')->get();

        return view('pages.loans', compact('loans'));
    }

    public function deposits()
    {
       $deposits = Product::where('type', 'Вклады')->get();

       return view('pages.deposits', compact('deposits'));
    }

    public function cards()
    {
        $cards = Product::where('type', 'Карты')->get();

        return view('pages.cards', compact('cards'));
    }

    public function business()
    {
        return view('pages.business');
    }

    public function about()
    {
        return view('pages.about');
    }
}
