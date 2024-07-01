<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class StaffController extends Controller
{
    public function addRole()
    {
        return view("roles.add");
    }

    public function showLoginForm()
    {
        return view("auth.login");
    }
    public function verifyOTP(Request $request)
    {
        $credentials = $request->only('phone', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        } {
            return back()->with(['error' => 'Invalid OTP.']);
        }
    }
    public function staffList()
    {
        $staffs = User::where('id', '!=', Auth::id())->get();
        return view("staffs.staffs", compact("staffs"));
    }
    public function registerStaff(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'fullname' => 'required|string',
            'phone' => 'required|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:1,2',
        ]);
        $numberStr = (string) $validatedData["phone"];
        if ($numberStr[0] === '0') {
            $mobile = "254" . ltrim($validatedData["phone"], '0');

        } else {
            $mobile =$validatedData["phone"];
        }
        // Create a new user instance
        $user = new User();
        $user->name = $validatedData['fullname'];
        $user->phone = $mobile;
        $user->email = $validatedData['email'];
        $user->role = $validatedData['role'];
        $password = '1234';
        $user->password = bcrypt($password);
        // Save the new user

        if ($user->save()) {
            $this->sendOTP($mobile);
        }
        return redirect()->back()->with("status", "success");
    }

    public function sendOTP($mobile)
    {
        $otp = rand(1000, 9999);
        $mobile1 = $mobile;
        $otp = rand(1000, 9999);
        $numberStr = (string) $mobile1;
        if ($numberStr[0] === '0') {
            $mobile = "254" . ltrim($mobile1, '0');
        } else {
            $mobile = $mobile1;
        }
        $user = User::where("phone", $mobile)->first();
        try {
            $headers = ["Cookie: ci_session=ttdhpf95lap45hqt3h255af90npbb3ql"];
            $user->update([
                "password" => Hash::make($otp),
            ]);
            $senderName = rawurlencode("IMS");
            $bulkBalanceUser = "voucher";
            $encodMessage = rawurlencode("Your UrgentCargo account is ready, you can now login");
            $url = "https://3.229.54.57/expresssms/Api/send_bulk_api?action=send-sms&api_key=Snh2SGFQT0dIZmFtcRGU9ZXBlcEQ=&to=$mobile&from=$senderName&sms=$encodMessage&response=json&unicode=0&bulkbalanceuser=$bulkBalanceUser";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_ENCODING, "");
            curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
            curl_setopt($ch, CURLOPT_TIMEOUT, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            $response = curl_exec($ch);
            $res = json_decode($response);
            curl_close($ch);
            return redirect()->route('otp-verification')->with("phone", $mobile)->with("status", "success");

        } catch (\Exception $e) {
            Log::debug($e);
            return response()->json(["status" => "error", "message" => "Unable to request OTP."]);
        }

    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logout the user

        $request->session()->invalidate(); // Invalidate the session

        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect()->route('login'); // Redirect to the login page
    }

}
