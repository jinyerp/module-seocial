<?php
namespace Modules\Social\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class WireSocialLogin extends Component
{
    public $forms=[];
    public $message=[];

    public function mount()
    {

    }

    public function render()
    {
        $provider = DB::table('user_oauth_providers')
                        ->where('enable', 1)
                        ->get();

        return view("social::social.login",[
            'provider' => $provider
        ]);
    }

}
