<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rules\UsernameValid;

class UserController extends Controller {

    /**
     * Register new user
     *
     * @param $request Request
     */
    public function register(Request $request) {
        $this->validate($request, [
            'username' => 'bail|required|unique:users|UsernameValid|string|max:255',
            'email' => 'required|email|unique:users',
            'telephone' => 'required|string|unique:users',
            'password' => 'required'
        ]);

        $hasher = app()->make('hash');
        $email = $request->input('email');
        $telephone = $request->input('telephone');
        $username = $request->input('username');
        $password = $hasher->make($request->input('password'));
        $user = User::create([
                'username' => $username,
                'email' => $email,
                'telephone' => $telephone,
                'password' => $password,
        ]);

        $res['success'] = true;
        $res['message'] = 'Success register!';
        $res['data'] = $user;
        return response($res);
    }

    public function patch(Request $request, $id) {
        $user = User::where('id', $id)->get()->first();
        if ($user) {
            $validInput = true;
            foreach ($request->input() as $field=>$value)
            {
                if (\Schema::hasColumn('users', $field))
                {
                    $user->{$field} = $value;
                }
                else
                {
                    $validInput = false;
                }
            }
            // report if htere was bad input
            if ($validInput)
            {
                $res['success'] = $user->update();
;
                $res['message'] = $user;
            }
            else
            {
                $res['success'] = false;
                $res['message'] = 'invalid fields provided for user';
            }
                
//            die('dunoit');
        } else {
            $res['success'] = false;
            $res['message'] = 'Cannot find user!';
        }
        return response($res);
    }

    /**
     * Get user by id
     *
     * URL /user/{id}
     */
    public function get_user(Request $request, $id) {
        $user = User::where('id', $id)->get();
        if ($user) {
            $res['success'] = true;
            $res['message'] = $user;

            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Cannot find user!';

            return response($res);
        }
    }
}
