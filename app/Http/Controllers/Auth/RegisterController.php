<?php
namespace App\Http\Controllers\Auth;
use App\User;
use App\Card;
use DB;
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
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'portal/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('check',['only' =>['register']]);
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
        'lastname' => 'required|string|max:255',
        'firstname' => 'required|string|max:255',
        'middlename' => 'required|string|max:255',
        'dob' => 'required|before:15 years ago',
        'sex' => 'required',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'pin' => 'required|string|min:12',
        'phone' => 'required|string|min:11|unique:users',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:25',
        'state' => 'required',
        'lga' => 'required'
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
          'first_name' => $data['firstname'],
          'middle_name' => $data['middlename'],
          'last_name' => $data['lastname'],
          'sex' => $data['sex'],
          'phone' => $data['phone'],
          'dob' => $data['dob'],
          'state_id' => $data['state'],
          'location_id' => $data['lga'],
          'email' => $data['email'],
          'password' => Hash::make($data['password']),
          'address' => $data['address'],
          'city' => $data['city'],
        ]);
        //update the status of the card
        DB::table('cards')->where('pin', $data['pin'])->update(['status' => 'USED']);
        return $user;
    }
}
