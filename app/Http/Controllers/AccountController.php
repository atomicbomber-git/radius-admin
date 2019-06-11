<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::query()
            ->select("id", "username", "value")
            ->get();

        return view("account.index", compact("accounts"));
    }
    
    public function create()
    {
        return view("account.create");
    }
    
    public function store()
    {
        $data = $this->validate(request(), [
            "username" => "required|string|unique:radius.radcheck",
            "password" => "required|string|confirmed",
        ]);

        Account::create([
            "username" => $data["username"],
            "attribute" => Account::DEFAULT_ATTRIBUTE,
            "op" => Account::DEFAULT_OP, 
            "value" => $data["password"],
        ]);

        return redirect()
            ->route("account.index")
            ->with("message_text", __("messages.create.success"))
            ->with("message_state", __("success"));
    }
    
    public function edit(Account $account)
    {
        return view("account.edit", compact("account"));
    }
    
    public function update(Account $account)
    {
        $data = $this->validate(request(), [
            "username" => ["required", "string", Rule::unique("radius.radcheck")->ignore($account->id)],
            "password" => "required|string",
        ]);

        $account->update([
            "username" => $data["username"],
            "attribute" => Account::DEFAULT_ATTRIBUTE,
            "op" => Account::DEFAULT_OP, 
            "value" => $data["password"],
        ]);

        return redirect()
            ->route("account.edit", $account)
            ->with("message_text", __("messages.update.success"))
            ->with("message_state", __("success"));
    }

    public function delete(Account $account)
    {
        $account->delete();

        return redirect()
            ->route("account.index")
            ->with("message_text", __("messages.delete.success"))
            ->with("message_state", __("success"));
    }
}
