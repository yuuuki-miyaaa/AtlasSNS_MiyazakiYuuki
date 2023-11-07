<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {

            $request->validate([
                //バリーデーションを設定
                'username' => 'required|string|max:12|min:2',
                'mail' => 'required|string|email|max:40|min:5|unique:users',
                'password' => 'required|string|max:20|min:8|confirmed',
                // 'username' => ['required', 'string', 'max:12', 'min:2'],
                // 'mail' => ['required', 'string', 'email', 'max:40', 'min:5', 'unique:users'],
                // 'password' => ['required', 'string', 'max:20', 'min:8', 'confirmed'],
                //required:必須,string:文字列,max:最大文字数,min:最小文字数,
                //email:メール型？,unique:一つの,confirmed:確認済み(一致するかどうか？)
            ]);

            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');

            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);

            return view('auth.added', compact('username'));
            //redirectをviewに変更、変数の受け渡しに使うcompactでusernameを送る
        }
        return view('auth.register',);
    }

    public function added()
    {
        return view('auth.added');
    }
}
