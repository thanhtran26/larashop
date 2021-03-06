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
			->subject('Kh??i ph???c m???t kh???u')
			->line('B???n v???a y??u c???u ' . config('app.name') . ' kh??i ph???c m???t kh???u c???a m??nh.')
			->line('Xin vui l??ng nh???n v??o n??t "Kh??i ph???c m???t kh???u" b??n d?????i ????? ti???n h??nh c???p m???t kh???u m???i.')
			->action('Kh??i ph???c m???t kh???u', url(config('app.url') . route('password.reset', $this->token, false)))
			->line('N???u b???n kh??ng y??u c???u ?????t l???i m???t kh???u, xin vui l??ng kh??ng l??m g?? th??m v?? b??o l???i
			cho qu???n tr??? h??? th???ng v??? v???n ????? n??y.');
	}
}
