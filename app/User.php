<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'address', 'user_role_id', 'suspended', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
/*
    protected $primaryKey = 'user_id';

    public function logInUser(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validateData->fails()) {
            return Redirect::to('logIn')->withErrors($validateData)->withInput(['email' => $request->get('email')]);
        } else {
            if (Auth::attempt(['email' => $request->get('email'), 'password' => Hash::make($request->get('password'))]))
                return true;
        }
        return false;
    }

    public static function logOut()
    {
        Auth::logout();
        return redirect('/logIn');
    }
*/
    public static  function getAllStudents()
    {
        $role = Role::where('role_name', 'student')->value('role_id');
        if ($role) {
            $students = User::where('user_role_id', $role)->get();
            return $students;
        } else {
            return [];
        }
    }
    function StudentCourse(){
	return $this->hasMany(\App\StudentCourse::class);

    
    }

}
