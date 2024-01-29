<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invitation;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitationEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

use App\Mail\SampleMail;

class InvitationController extends Controller
{
    public function inviteUser($token, $workspace_id)
    {
        // Tạo một mã token ngẫu nhiên
        // $token = Str::random(32);
        // $workspace_id = Auth::user()->current_workspace;
        // Lưu thông tin lời mời vào database
        // Invitation::create([
        //     'workspace_id' => $workspace_id,
        //     'email' => 'nqv1710@gmail.com',
        //     'token' => $token,
        // ]);

        // Gửi email mời
        // Mail::to($email)->send(new InvitationEmail($token));
        // return redirect()->back()->with('success', 'Đã gửi lời mời thành công.');
        Session::put('token', $token);
        Session::put('workspace_id', $workspace_id);
        // dd($token, $workspace_id);
        return redirect()->route('login', ['token' => $token, 'workspace_id' => $workspace_id]);
    }
    public function sendInvitation(Request $request)
    {
        // Xử lý dữ liệu từ form và gửi email, lấy workspace_id và email_id
        $email = $request->input('email');
        $workspace_id = Auth::user()->current_workspace;
        // dd($workspace_id);
        $token = Str::random(32);

        // Lưu thông tin lời mời vào database
        // Invitation::create([
        //     'workspace_id' => $workspace_id,
        //     'email' => $email,
        //     'token' => $token,
        // ]);

        // Mail::to($email)->send(new InvitationEmail($token));

        return redirect('/')->with('success', 'Invitation sent successfully!');
    }

    public function index(Request $request)
    {
        $content = [
            'subject' => 'This is the mail subject',
            'body' => 'This is the email body of how to send email from laravel 10 with mailtrap.'
        ];
        $email = $request->input('email');

        $workspace_id = Auth::user()->current_workspace;

        $invitation = Invitation::where('workspace_id', Auth::user()->current_workspace)->first();

        // dd($invitation);
        Mail::to($email)->send(new InvitationEmail($invitation));

        return redirect('/')->with('success', 'Invitation sent successfully!');
    }


    public function updateInvitations(Request $request)
    {
        if ($request->ajax()) {
            $workspace_id = $request->invi_workspace_id;
            $token = Str::of($request->token);

            $status = $request->isChecked;

            $invitation = Invitation::where('workspace_id', $workspace_id)->first();
            $new_token = $token;

            // Vì status bên ajax trả về là dạng chuỗi
            if ($status == 'true') {
                $new_token = Str::random(32);
                $invitation->token = $new_token;
                $invitation->status = 1;
            }
            if ($status == 'false') {
                $invitation->status = 0;
            }
            $invitation->save();

            $new_url = route('invite', [
                'token' => $new_token,
                'workspace_id' => $workspace_id
            ]);

            $msg = response()->json([
                'success' => true,
                'msg' => 'Cập nhật thành công',
                'url' => $new_url,
                'new_token' => $new_token,
                'status' => $status,
            ]);
            return $msg;
        }
    }
}
