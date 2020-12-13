<?php

namespace App\Http\Controllers;

use App\Event;
use App\Profile;
use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Event $event){
        return auth()->user()->following()->toggle($event);
    }
}
