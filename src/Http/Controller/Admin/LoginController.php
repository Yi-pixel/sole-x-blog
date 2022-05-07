<?php


namespace SoleX\Blog\Http\Controller\Admin;


use Auth;
use Event;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;
use SoleX\Blog\Enums\Abilities;
use SoleX\Blog\Enums\SessionKeys;
use SoleX\Blog\Http\Controller\BaseController;
use SoleX\Blog\Models\User;
use SoleX\Blog\Traits\ViewTrait;

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

        // 必须是用户且是管理员
        assert($user instanceof User && $user->isAdmin());

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
