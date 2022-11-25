<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\UserCart;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Constraints\CountInDatabase;
use PhpParser\Node\Stmt\Return_;

class CustomerLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {

            $user_name = Auth::guard('customer')->user()->name;
            $user_id = Auth::guard('customer')->user()->id;

            $user_cart = UserCart::where("user_id", $user_id)->sum('quantity');

            return response()->json(['credentials' => $user_name, 'count' => $user_cart], 200);
        }
    }
    public function showLoginForm()
    {
        return view('backend.login');
    }
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request),
            $request->boolean('remember')
        );
    }
    protected function guard()
    {
        return Auth::guard('customer');
    }
    public function username()
    {
        return 'email';
    }
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();
        return redirect()->route('main_page');
    }

    public function registerCustomer(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $customer = new Customers();

        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->password = Hash::make($request['password']);

        $customer->save();

        return redirect()->route('main_page');
    }
}
