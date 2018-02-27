<?php
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\User;
use App\Rules\UsernameValid;
 
class UserController extends Controller
{
    /**
     * Register new user
     *
     * @param $request Request
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'username' => 'bail|required|UsernameValid|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|phone|unique:users',
            'password' => 'required'
        ]);
 
        $hasher = app()->make('hash');
        $email = $request->input('email');
        $password = $hasher->make($request->input('password'));
        $user = User::create([
            'email' => $email,
            'password' => $password,
        ]);
 
        $res['success'] = true;
        $res['message'] = 'Success register!';
        $res['data'] = $user;
        return response($res);
    }
    /**
     * Get user by id
     *
     * URL /user/{id}
     */
    public function get_user(Request $request, $id)
    {
        $user = User::where('id', $id)->get();
        if ($user) {
              $res['success'] = true;
              $res['message'] = $user;
 
              return response($res);
        }else{
          $res['success'] = false;
          $res['message'] = 'Cannot find user!';
 
          return response($res);
        }
    }
}