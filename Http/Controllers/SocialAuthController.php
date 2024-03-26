<?php
namespace Modules\Social\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function index()
    {
        return view('social::index');

        /*
        $providers = DB::table('user_oauth_providers')->where('enable', 1)->get();
        if($providers) {
            return view('social::index',['providers'=>$providers]);
        }

        return "등록된 소셜로그인 정보가 없습니다.";
        */
    }
}
