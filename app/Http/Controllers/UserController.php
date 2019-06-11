<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->select("id", "username")
            ->get();

        return view("user.index", compact("users"));
    }
    
    public function create()
    {
    }
    
    public function store()
    {
    }
    
    public function edit(User $user)
    {
    }
    
    public function update(User $user)
    {
    }
    
    public function delete(User $user)
    {
        $user->delete();

        return redirect()
            ->route("user.index")
            ->with("message_text", __("messages.delete.success"))
            ->with("message_state", __("success"));
    }
}
