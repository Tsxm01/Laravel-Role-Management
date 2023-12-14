<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Permission;
use App\Models\assigned_role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    protected $userData;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (session()->has('id')) {
                $this->userData = $this->loadUserData(session()->get('id'));
            }

            return $next($request);
        });
    }

    public function index(Request $request)
    {
        if (session()->has('id')) {
            $data = $this->loadUserData(session()->get('id'));

            if ($data) {
                return $this->sidebar($data);
            }

            return view('welcome');
        } else {
            return view('login');
        }
    }

    protected function loadUserData($userId)
    {
        $userData = User::with('assigned')->find($userId);

        if ($userData) {
            $assignedId = $userData->assigned->permission_id;
            $explode = explode(',', $assignedId);
            $userData['auth'] = Permission::whereIn('id', $explode)->get();

            return $userData->toArray(); // Convert the User model to an array
        }

        return null;
    }

    public function sidebar(array $data)
    {
        return view('layouts.sidebar', $data);
    }
    public function login_page(Request $request)
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {

            $request->session()->put('id', $user['id']);
            $request->session()->put('roles', $user['roles']);
            return redirect('/');
        } else {
            $request->session()->flash('errormsg');
            return back();
        }


    }
    public function add_user(Request $request)
    {
        $data['user'] = User::all();
        $data = array_merge($data, $this->userData);
        return view('user', $data);
    }
    public function create_user(Request $request)
    {
        $res = new User;
        $res->name = $request->name;
        $res->email = $request->email;
        $res->password = bcrypt($request->password);
        $res->save();

        return back();
    }
    public function edit_user(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;

        $update_user = User::where('id', $id)->update(['name' => $name, 'email' => $email]);

        if ($update_user) {
            return back()->with('success', 'Changes Done');
        } else {
            return back()->with('error', 'Something is wrong');
        }
    }

    public function delete_user(Request $request)
    {
        $id = $request->id;
        $res = User::where('id', $id)->delete();

        if ($res) {
            return back()->with('success_delete', 'Successful Deleted');
        } else {
            return back()->with('error', 'Something is wrong');
        }
    }

    // Permission

    public function add_permission(Request $request)
    {
        $data['user'] = Permission::all();
        $data = array_merge($data, $this->userData);
        return view('permission', $data);
    }
    public function create_permission(Request $request)
    {
        $res = new Permission;
        $res->blade_name = $request->name;
        $res->blade_file_name = $request->file_name;
        $res->save();

        return back();
    }
    public function edit_permission(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $file_name = $request->file_name;

        $update_user = Permission::where('id', $id)->update(['blade_name' => $name, 'blade_file_name' => $file_name]);

        if ($update_user) {
            return back()->with('success', 'Changes Done');
        } else {
            return back()->with('error', 'Something is wrong');
        }
    }
    public function delete_permission(Request $request)
    {
        $id = $request->id;
        $res = Permission::where('id', $id)->delete();
        if ($res) {
            return back()->with('success_delete', 'Successful Deleted');
        } else {
            return back()->with('error', 'Something is wrong');
        }
    }


    // assign permisssion

    public function assign_permission(Request $request)
    {
        $users = User::with('assigned')->get();
        foreach ($users as $user) {
            $permissionIds = explode(',', $user->assigned->permission_id ?? '');

            $permissions = Permission::whereIn('id', $permissionIds)->pluck('blade_name');
            $user->blade = $permissions->toArray();
        }

        $data['users'] = $users;
        // foreach ($users as $user)
        // {
        //     // echo '<pre>';
        //     // // print_r($user);
        //     // echo '</pre>';

        //     echo "<h3>User: {$user->name}</h3>";

        //     $pr[] =  $user['blade'];

        //     foreach ($pr as $key)
        //     {

        //     }
        //     echo "<ul>";
        //     foreach ($key as $value)
        //     {
        //         // echo $value;
        //         echo "<li>{$value}</li>";
        //     }
        //     echo "</ul>";

        // }
        $data['user'] = User::all();
        $data['permission'] = Permission::all();
        $data = array_merge($data, $this->userData);

        return view('assign-role', $data);
    }
    public function creat_role(Request $request)
    {
        $roles = $request->role;
        $explode = implode(',', $roles);
        $res = new assigned_role;
        $res->user_id = $request->user;
        $res->permission_id = $explode;
        $res->save();

        $lastid = $res->id;

        $update_user = User::where('id', $request->user)->update(['roles' => $lastid]);

        return back();
    }
}
