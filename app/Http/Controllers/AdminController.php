<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Travel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.index',[
            'travel_package' => Travel::count(),
            'transaction' => Transaction::count(),
            'transaction_pending' => Transaction::where('transaction_status', 'pending')->count(),
            'transaction_success' => Transaction::where('transaction_status', 'success')->count()
        ]);
    }

    public function adminlogin()
    {
        return view('admin.login');
    }

    public function adminlogout(Request $request)
    {
          Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    } // End Mehtod

    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        return view('admin.profile', [
            'data' => $data
        ]);
    }

    public function AdminProfileStore(Request $request)
    {   
        // $request->validate([
        //     'username' => 'required',
        //     'phone' => 'required',
        //     'address' => 'required',
        //     'photo' => 'nullable|mimes:,jpeg|max:2048',
        // ]);
      $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->phone = $request->phone;
        $data->address = $request->address; 


        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();
           $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return to_route('admin.profile')->with($notification);

    } // End Mehtod 
    public function AdminChangePassword()
    {
        return view('admin.changepassword');
    }
      public function AdminUpdatePassword(Request $request){
        // Validation 
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed', 
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't Match!!");
        }

        // Update The new password 
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);
        return back()->with("status", " Password Changed Successfully");

    } // End Mehtod
    public function InactiveVendor(){
        $inActiveVendor = User::where('status','inactive')->where('role','vendor')->latest()->get();
        return view('backend.vendor.inactive',compact('inActiveVendor'));

    }// End Mehtod  
    
    public function ActiveVendor(){
        $ActiveVendor = User::where('status','active')->where('role','vendor')->latest()->get();
        return view('backend.vendor.active',compact('ActiveVendor'));

    }// End Mehtod 
     public function InactiveVendorDetails($id){

        $inactiveVendorDetails = User::findOrFail($id);
        return view('backend.vendor.inactive_detail',compact('inactiveVendorDetails'));

    }// End Mehtod 
        public function ActiveVendorApprove(Request $request){

        $verdor_id = $request->id;
        $user = User::findOrFail($verdor_id)->update([
            'status' => 'active',
        ]);

        $notification = array(
            'message' => 'Vendor Active Successfully',
            'alert-type' => 'success'
        );

        return to_route('active.vendor')->with($notification);

    }// End Mehtod
    
  
    public function ActiveVendorDetails($id){

        $activeVendorDetails = User::findOrFail($id);
        return view('backend.vendor.active_detail',compact('activeVendorDetails'));

    }// End Mehtod 


     public function InActiveVendorApprove(Request $request){

        $verdor_id = $request->id;
        $user = User::findOrFail($verdor_id)->update([
            'status' => 'inactive',
        ]);

        $notification = array(
            'message' => 'Vendor InActive Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('inactive.vendor')->with($notification);

    }// End Mehtod 
}
