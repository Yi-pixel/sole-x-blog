<?php


namespace SoleX\Blog\App\View\Components\User;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\View\Component;
use SoleX\Blog\App\Traits\ViewTrait;

class Avatar extends Component
{
    use ViewTrait;

    public function __construct(public ?string $src = null)
    {
        $user = Auth::user();
        $this->src = (string)($user?->avatar) ?: URL::asset('image/user-avatar.jpg');
    }

    public function render()
    {
        return $this->component();
    }
}