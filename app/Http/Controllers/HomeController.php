<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingPage;

class HomeController extends Controller
{
    public function index()
    {
        $contents = LandingPage::getAllContent();
        return view('home', compact('contents'));
    }
}
