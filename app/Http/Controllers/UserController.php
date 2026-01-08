<?php

namespace App\Http\Controllers;

use App\Mail\UserCountMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function userCount()
    {
        $count = User::whereDate('created_at', today())->count();
        Mail::to("fkfiroj2025@gmail.com")->send(new UserCountMail($count));
    }
}
