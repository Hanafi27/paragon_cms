<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;

class OrganizationController extends Controller
{
    public function index()
    {
        $organization = Organization::first();
        return view('organization', compact('organization'));
    }
}
