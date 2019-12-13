<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use App\Models\BaseModel;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
 * Class Team.
 *
 * @package namespace App\Models;
 */
class Admin extends Authenticatable implements CanResetPasswordContract
{
    use Notifiable, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guard = 'admin';
    protected $table = "admins";
    protected $fillable = ['avatar', 'email','phone','address','position','lock_admin','name','password','remember_token'];
    protected $hidden = [
        'password', 'remember_token',
    ];
public function getChucvuAttribute(){
        $position = $this->position;
        switch ($this->position) {
            case '1':
                $position = 'Nhân Viên ';
                break;
            case '0':
                $position = 'Admin' ;
                break;
        }
        return $position;
    }

}
