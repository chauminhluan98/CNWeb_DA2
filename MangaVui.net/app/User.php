<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class User extends Authenticatable
{
	use Notifiable;
	
	protected $table = 'users';
	
	protected $fillable = [
		'name', 'username', 'email', 'password', 'privilege',
	];
	
	protected $hidden = [
		'password', 'remember_token',
	];
	
	protected $casts = [
		'email_verified_at' => 'datetime',
	];
	
	public function Post()
	{
		return $this->hasMany('App\Post');
	}
	
	public function Comment()
	{
		return $this->hasMany('App\Comment');
	}
	
	public function sendPasswordResetNotification($token)
	{
		$this->notify(new CustomResetPasswordNotification($token));
	}
}

class CustomResetPasswordNotification extends ResetPassword
{
	public function toMail($notifiable)
	{
		return (new MailMessage)
			->subject('Khôi phục mật khẩu')
			->line('Bạn vừa yêu cầu ' . config('app.name') . ' khôi phục mật khẩu của mình.')
			->line('Xin vui lòng nhấn vào nút "Khôi phục mật khẩu" bên dưới để tiến hành cấp mật khẩu mới.')
			->action('Khôi phục mật khẩu', url(config('app.url') . route('password.reset', $this->token, false)))
			->line('Nếu bạn không yêu cầu đặt lại mật khẩu, xin vui lòng không làm gì thêm và báo lại cho quản trị hệ thống về vấn đề này.');
	}
}
