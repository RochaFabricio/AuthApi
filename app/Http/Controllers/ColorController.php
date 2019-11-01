<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;
use JWTAuth;

class ColorController extends Controller
{
    protected $user;
 
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function index()
    {
        $color = Color::get();
        return $color;
    }

}