<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    public function index(){

        $services = Service::with('letter','categories')->get();
        return Inertia::render('Welcome', compact('services'));
    }
}
