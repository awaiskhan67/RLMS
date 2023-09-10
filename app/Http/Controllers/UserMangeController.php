<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserMangeController extends Controller
{
    //
    public function index(): View
    {
        $loguser = Auth::user(); // Get the currently logged-in user
        // Fetch all users
        $users = User::where('entry_id','!=',0)->where('id', '!=', $loguser->id)->orderBy('id','DESC')->get();
        $onlneusers = User::where('entry_id','=',NULL)->where('id', '!=', $loguser->id)->orderBy('id','DESC')->get();
        // Fetch all roles
        $roles = Role::all();
        return view('Users', compact('users','roles','onlneusers'));
    }

    public function user_create(UserRequest $request){
        
        $userData = [
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
            'address' => $request->address,
            'entry_id' => $request->user()->id,
            'active_status' => $request->status,
        ];

        // Check if the whatsapp_number is provided in the form
        if ($request->filled('whatsapp_number')) {
            $userData['whatsapp_number'] = $request->whatsapp_number;
        }

        // Check if an image is provided in the form
        if ($request->hasFile('image')) {
            $Photo = time() . '_' . $request->image->getClientOriginalName() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $Photo);
            $userData['image'] = $Photo;
        }

        $user = User::create($userData);
        $user->assignRole($request->role);

        return redirect()->back()->with('success', "User Account created Successfully !");
    }

    public function user_edite(Request $request, $id){

        $user = User::find($id);
        $selectedRoles = $user->roles->pluck('id')->toArray(); // IDs of the user's existing roles
        $roles=Role::all();
        return view('UsersEdite',compact('roles','user','selectedRoles'));

    }

    public function user_update(Request $request){

        $request->validate([
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $request->id],
        
            'contact_number' => ['required', 'string', 'max:255',  'unique:users,contact_number,' . $request->id],
            'whatsapp_number' => ['required', 'string', 'max:255', 'unique:users,whatsapp_number,' . $request->id],
            'address' => ['required', 'max:255'],
            'role' => ['required'],
            'status' => ['required'],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:2048'],
            'password' => ['nullable', 'confirmed', 'min:4', 'regex:/\d/'],
        ]);


        /////////////////////////
        // Find the user
            $user = User::find($request->id);
            if (!$user) {
                return redirect()->back()->with("error", "User not found.");
            }

            // Update password if provided
            $pass = $user->password;
            if ($request->password) {
                $pass = Hash::make($request->password);
            }

            // Handle photo upload
            $Photo = $user->image;
            if ($request->hasFile('image')) {
                if ($user->image) {
                    $path = public_path('uploads/' . $user->image);
                    unlink($path);
                }
                $Photo = time() . '_' . $request->image->getClientOriginalName() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads'), $Photo);
            }

            // Update user data using validated inputs
            $user->update([
                'f_name' => $request->f_name ,
                'l_name' => $request->l_name,
                'email' => $request->email,
                'contact_number' => $request->contact_number,
                'whatsapp_number' => $request->whatsapp_number,
                'address' => $request->address,
                'active_status' => $request->status,
                'password' => $pass,
                'image' => $Photo,
            ]);

            // Sync user roles
            $user->syncRoles([$request->role]);

            return redirect()->route('users')->with("success", "User Data updated successfully !");

        //////////////////
    }

    public function user_delete(Request $request , $id){

        $data = User::find($id);
        //delete photo
        if(file_exists(public_path('uploads/'.$data->image))){
          if($data->image){ unlink(public_path('uploads/'.$data->image)); }
        }
        $data->delete();
        return redirect()->route('users')->with('warning','User deleted scuccessfully !');
      
    }

    public function user_show(Request $request, $id){
        $user = User::findOrFail($id);
        $userRole = $user->roles->pluck('name')->first(); // Get the user's first role name
        $user->role = $userRole; // Add 'role' key to the user object
        return response()->json($user);
    }


}
