<?php


namespace SoleX\Blog\App\Http\Livewire\User;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use SoleX\Blog\App\Traits\ViewTrait;

class Avatar extends Component
{
    use ViewTrait;

    public string $src;

    public function mount()
    {
        $user = Auth::user();
        $this->src = (string)($user?->avatar) ?: URL::asset('image/user-avatar.jpg');
    }

    public function render()
    {
        return $this->livewire('user.avatar');
    }
}