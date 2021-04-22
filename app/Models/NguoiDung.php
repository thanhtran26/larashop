<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Role;


class NguoiDung extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $table = 'nguoidung';
    protected $fillable = [
        'name',
		'username',
        'email',
		'sdt',
        'password',
		'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	public function DonHang()
	{
		return $this->hasMany('App\Models\DonHang', 'nguoidung_id', 'id');
	}
	public function sendPasswordResetNotification($token)
	{
		$this->notify(new CustomResetPasswordNotification($token));
	}
	public function roles()
	{
		return $this->belongsToMany(Role::class);
	}
	
	public function authorizeRoles($roles)
	{
	  if (is_array($roles)) {
		  return $this->hasAnyRole($roles) || 
				 abort(401, 'This action is unauthorized.');
	  }
	  return $this->hasRole($roles) || 
			 abort(401, 'This action is unauthorized.');
	}
	/**
	* Check multiple roles
	* @param array $roles
	*/
	public function hasAnyRole($roles)
	{
	  return null !== $this->roles()->whereIn('name', $roles)->first();
	}
	/**
	* Check one role
	* @param string $role
	*/
	public function hasRole($role)
	{
	  return null !== $this->roles()->where('name', $role)->first();
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
			->line('Nếu bạn không yêu cầu đặt lại mật khẩu, xin vui lòng không làm gì thêm và báo lại
			cho quản trị hệ thống về vấn đề này.');
	}
}
