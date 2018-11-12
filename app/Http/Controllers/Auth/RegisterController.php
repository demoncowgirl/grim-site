<?php
namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    public function getRegister(){
      return view ('auth/register');
    }

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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|varchar|max:25|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'username' => $data['username'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

      public function store(Request $request)
      {
          // validate the data
        $validatedData = $request ->validate([
            'name' => 'required||max:255',
            'email' => 'required|unique:users',
            'username' => 'required|unique:users\max:25',
            'role' => 'required',
            'password' => 'required'
          ]);
          // store in database
          $user = new User;
          $user -> name = $request -> input('name');
          $user -> email = $request -> input('email');
          $user -> username = $request -> input('username');
          $user -> role = $request -> input ('role');
          $user -> password = $request -> input('password');
          $post -> save();

          Session::flash('success', 'You are now registered with the username of '.$user -> username.' and have permission to leave blog comments!');

          return redirect()->route('pages.home');
      }
}
