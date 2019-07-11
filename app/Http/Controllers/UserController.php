<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Validation\Rule;
use App\Enums\UserLevel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize("index", User::class);

        $users = User::query()
            ->select("id", "name", "username", "level")
            ->get();

        return view("user.index", compact("users"));
    }

    public function create()
    {
        $this->authorize("create", User::class);
        return view("user.create");
    }

    public function store()
    {
        $this->authorize("create", User::class);

        $data = $this->validate(request(), [
            "name" => "required|string",
            "username" => "required|string|unique:users",
            "level" => Rule::in(array_keys(UserLevel::LEVELS)),
            "password" => "required|string|confirmed",
        ]);

        User::create(array_merge($data, [
            "password" => Hash::make($data["password"])
        ]));

        return redirect()
            ->route("user.index")
            ->with("message_text", __("messages.create.success"))
            ->with("message_state", __("success"));
    }

    public function edit(User $user)
    {
        $this->authorize("update", $user);
        return view("user.edit", compact("user"));
    }

    public function update(User $user)
    {
        $this->authorize("update", $user);

        $data = $this->validate(request(), [
            "name" => "required|string",
            "username" => ["required", "string", Rule::unique("users")->ignore($user->id)],
            "level" => [
                Rule::in(array_keys(UserLevel::LEVELS)),
                /* A Superadmin can't downlevel himself into a regular Admin */
                function ($attribute, $value, $fail) use($user) {
                    if (Auth::user()->id === $user->id) {
                        if ((Auth::user()->level === UserLevel::SUPER_ADMIN) && ($value === UserLevel::ADMIN)) {
                            $fail("Anda tidak dapat menurunkan level akun Anda sendiri.");
                        }
                    }
                },
            ],
            "password" => "sometimes|nullable|string|confirmed",
        ]);

        if (empty($data["password"])) {
            unset($data["password"]);
        }

        $user->update(array_merge($data, [
            "password" => Hash::make($data["password"])
        ]));

        return redirect()
            ->route("user.edit", $user)
            ->with("message_text", __("messages.update.success"))
            ->with("message_state", __("success"));
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
