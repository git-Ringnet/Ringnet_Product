<!-- resources/views/emails/invitation.blade.php -->

Xin chào,

Bạn đã được mời tham gia vào workspace của chúng tôi. Hãy nhấn vào liên kết bên dưới để đăng ký:

{{ route('invite', ['token' => $invitation->token, 'workspace_id' => $invitation->workspace_id]) }}
