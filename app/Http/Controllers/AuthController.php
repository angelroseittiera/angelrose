<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function home(){
        return view('home');
    }
    public function register(){
        return view('register');
    }
    public function login(){
        return view('login');
    }
    public function submitregister(Request $request){
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        $check = $this->create($data);
        return redirect("login")->withSuccess('Great! please login.');
    }
    public function create(array $data)
    {
      return User::create([
        'name' => $data['username'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
    public function submitlogin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            
            if ($request->email == "admin@gmail.com") {
                return redirect('adminhome')->with('success', 'You have Successfully logged in as admin');
            } else {
                return redirect('userhome')->with('success', 'You have Successfully logged in');
            }
        }
        return redirect('login')->withErrors(['login_error' => 'Invalid email or password']);
    }
    public function adminhome(){
        $id=Auth::user()->id;
        $data =User::getdetails($id);
        return view('adminhome')->with('data',$data);
    }
    public function viewuser(Request $request){
        $id=Auth::user()->id;
        if(\request()->ajax()){
            $data = User::select('users.id','users.name','users.email','users.password')->where('users.id','!=',$id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.url('edit/'.$row->id).'" class="edit btn btn-success btn-sm">Edit</a> <a href="'.url('delete/'.$row->id).'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('viewuser');
    }
    public function edituser($id)
    {
        $user = User::find($id);
        return view('edituserdetails')->with('user',$user);
    }
    public function edituserdetails(Request $request)
    {
        if($request){
            $request->validate([
                'id' => 'required|exists:users,id',
                'username' => 'required',
                'email' => 'required|email|unique:users,email,' . $request->id,
                // 'password' => 'nullable|min:6', // Password is optional on update
            ]);
            $user = User::findOrFail($request->id);
            $user->name = $request->username;
            $user->email = $request->email;
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }
            $user->save();
            $success = "User Updated successfully";
            return view('viewuser')->with('success',$success);
        }
        else{
            return view('edituserdetails')->with('user', $user);
        } 
    }

    public function deleteuser($id)
    {
        $user = User::find($id);
        $user->delete();
        $success = "User deleted successfully";
        return view('viewuser')->with('success',$success);
    }
    public function logout() {
        Session::flush();
        Auth::logout();
        return view('home');
    }


    // user

    public function userhome(){
        $id=Auth::user()->id;
        $data =User::getdetails($id);
        return view('userhome')->with('data',$data);
    }
}
