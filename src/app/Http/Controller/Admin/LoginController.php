<?php


namespace SoleX\Blog\App\Http\Controller\Admin;


use Auth;
use Event;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;
use SoleX\Blog\App\Enums\Abilities;
use SoleX\Blog\App\Enums\SessionKeys;
use SoleX\Blog\App\Http\Controller\BaseController;
use SoleX\Blog\App\Traits\ViewTrait;

class LoginController extends BaseController
{
    use ViewTrait;

    public function __invoke()
    {
        if (Gate::check(Abilities::AdminVerified->value)) {
            return redirect()->route('admin.dashboard');
        }

        $user = Auth::user();
        return $this->pages('admin.login', compact('user'));
    }

    public function login(Request $request, Hasher $hasher)
    {
        ['password' => $password] = $this->validate($request, ['password' => 'bail|required|min:5']);

        $user = Auth::user();
        $admin = $user->admin;
        $adminPassword = $admin->password;
        $check = $hasher->check($password, $adminPassword);

        if (!$check) {
            Event::dispatch('admin.login.failed', $request->all());
            return back();
        }

        if ($hasher->needsRehash($adminPassword)) {
            $admin->password = $hasher->make($password);
            Event::dispatch('admin.login.updated-password-hash', $user);
            $admin->save();
        }

        session()->put(SessionKeys::AdminVerified->value, Carbon::now()->toDateTimeString());

        Event::dispatch('admin.login.success', $user);

        return redirect()->route('admin.dashboard');
    }
}
