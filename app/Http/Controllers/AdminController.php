<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\ProcessUserRequest;
use App\Http\Requests\Auth\UpdatePassword;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Logout
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User logout successfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }

    // Profile
    public function profile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    // Edit Profile
    public function editProfile()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function storeProfile(ProcessUserRequest $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->hasFile('user_image')) {
            $file = $request->file('user_image');
            $ext = $file->extension();

            $filename = date('YmdHis') . rand(10, 1000) . '.' . $ext;

            // Store image at storage/app/public/profile folder
            $file->storeAs('public/profile', $filename);
            $data['profile_image'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin profile updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function changePassword()
    {
        return view('admin.admin_change_password');
    }

    public function updatePassword(UpdatePassword $request)
    {
        $hashedPassword = Auth::user()->password;

        if (!Hash::check($request->current_password, $hashedPassword)) {
            $notification = [
                'message' => 'Current password does not match!',
                'alert-type' => 'error',
            ];

            return redirect()->route('change.password')->with($notification);
        }

        $user = User::find(Auth::id());
        $user->password = bcrypt($request->new_password); // Ensure to hash the new password
        $user->save(); // Save the user model

        $notification = [
            'message' => 'Password updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('change.password')->with($notification);
    }
}
