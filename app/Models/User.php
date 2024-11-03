<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    static function getAdmins() {
        $return = self::select('users.*')
                    ->where('role', 1)
                    ->where('is_delete', 0);

        if (!empty(Request::get('email'))) {
            $return = $return->where('email', 'like', '%' . Request::get('email') . '%');
        }

        if (!empty(Request::get('name'))) {
            $return = $return->where('name', 'like', '%' . Request::get('name') . '%');
        }

        if (!empty(Request::get('date'))) {
            $return = $return->whereDate('created_at', '=', Request::get('date'));
        }

        $return = $return->orderBy('id', 'desc')
                    ->paginate(5);
        return $return;
    }

    static function getTeachers() {
        $return = self::select('users.*')
                    ->where('users.role', 2)
                    ->where('users.is_delete', 0);

        if (!empty(Request::get('name'))) {
            $return = $return->where('users.name', 'like', '%' . Request::get('name') . '%');
        }

        if (!empty(Request::get('last_name'))) {
            $return = $return->where('users.last_name', 'like', '%' . Request::get('last_name') . '%');
        }

        if (!empty(Request::get('email'))) {
            $return = $return->where('users.email', 'like', '%' . Request::get('email') . '%');
        }

        if (!empty(Request::get('gender'))) {
            $return = $return->where('users.gender', '=', Request::get('gender'));
        }

        if (!empty(Request::get('mobile_number'))) {
            $return = $return->where('users.mobile_number', 'like', '%' . Request::get('mobile_number') . '%');
        }

        if (!empty(Request::get('marital_status'))) {
            $return = $return->where('users.marital_status', 'like', '%' . Request::get('marital_status') . '%');
        }


        if (!empty(Request::get('current_address'))) {
            $return = $return->where('users.current_address', 'like', '%' . Request::get('current_address') . '%');
        }


        if (!empty(Request::get('status'))) {
            $return = $return->where('users.status', Request::get('status'));
        }

        if (!empty(Request::get('admission_date'))) {
            $return = $return->whereDate('users.admission_date', '=', Request::get('admission_date'));
        }

        if (!empty(Request::get('date'))) {
            $return = $return->whereDate('users.created_at', '=', Request::get('date'));
        }

        $return = $return->orderBy('users.id', 'desc')
                    ->paginate(5);
        return $return;
    }
    static function getstudents() {
        $return = self::select('users.*', 'class.name as class_name', 'parents.name as parent_name', 'parents.last_name as parent_last_name')
                    ->join('users as parents', 'parents.id', '=', 'users.parent_id', 'left')
                    ->join('class', 'class.id', '=', 'users.class_id', 'left')
                    ->where('users.role', 3)
                    ->where('users.is_delete', 0);


        if (!empty(Request::get('name'))) {
            $return = $return->where('users.name', 'like', '%' . Request::get('name') . '%');
        }

        if (!empty(Request::get('last_name'))) {
            $return = $return->where('users.last_name', 'like', '%' . Request::get('last_name') . '%');
        }

        if (!empty(Request::get('email'))) {
            $return = $return->where('users.email', 'like', '%' . Request::get('email') . '%');
        }

        if (!empty(Request::get('admission_number'))) {
            $return = $return->where('users.admission_number', 'like', '%' . Request::get('admission_number') . '%');
        }

        if (!empty(Request::get('roll_number'))) {
            $return = $return->where('users.roll_number', 'like', '%' . Request::get('roll_number') . '%');
        }

        if (!empty(Request::get('class'))) {
            $return = $return->where('class.name', 'like', '%' . Request::get('class') . '%');
        }

        if (!empty(Request::get('gender'))) {
            $return = $return->where('users.gender', '=', Request::get('gender'));
        }

        if (!empty(Request::get('caste'))) {
            $return = $return->where('users.caste', 'like', '%' . Request::get('caste') . '%');
        }

        if (!empty(Request::get('religion'))) {
            $return = $return->where('users.religion', 'like', '%' . Request::get('religion') . '%');
        }

        if (!empty(Request::get('mobile_number'))) {
            $return = $return->where('users.mobile_number', 'like', '%' . Request::get('mobile_number') . '%');
        }

        if (!empty(Request::get('blood_group'))) {
            $return = $return->where('users.blood_group', 'like', '%' . Request::get('blood_group') . '%');
        }

        if (!empty(Request::get('admission_date'))) {
            $return = $return->whereDate('users.admission_date', '=', Request::get('admission_date'));
        }

        if (!empty(Request::get('date'))) {
            $return = $return->whereDate('users.created_at', '=', Request::get('date'));
        }

        if (!empty(Request::get('status'))) {
            $return = $return->where('users.status', '=', Request::get('status'));
        }

        $return = $return->orderBy('users.id', 'desc')
                    ->paginate(5);
        return $return;
    }

    static function getSearchStudents() {
        if (empty(Request::get('id')) && empty(Request::get('name')) && empty(Request::get('last_name')) &&
            empty(Request::get('email'))) {
                return null;
        }
        $return = self::select('users.*', 'class.name as class_name', 'parents.name as parent_name')
            ->join('users as parents', 'parents.id', '=', 'users.parent_id', 'left')
            ->join('class', 'class.id', '=', 'users.class_id', 'left')
            ->where('users.role', 3)
            ->where('users.is_delete', 0);

        if (!empty(Request::get('id'))) {
            $return->where('users.id', Request::get('id'));
        }

        if (!empty(Request::get('name'))) {
            $return->where('users.name', 'like', '%' . Request::get('name') . '%');
        }

        if (!empty(Request::get('last_name'))) {
            $return->where('users.last_name', 'like' ,'%' . Request::get('last_name') . '%');
        }

        if (!empty(Request::get('email'))) {
            $return->where('users.email', 'like', '%' . Request::get('email') . '%');
        }

        $return = $return->orderBy('users.id', 'desc')
            // ->limit(100)
            // ->get();
            ->paginate(5);

        return $return;

    }

    static function getMyStudents($parent_id) {
        $return = self::select('users.*', 'class.name as class_name', 'parents.name as parent_name')
            ->join('users as parents', 'parents.id', '=', 'users.parent_id', 'left')
            ->join('class', 'class.id', '=', 'users.class_id', 'left')
            ->where('users.role', 3)
            ->where('parents.id', $parent_id)
            ->where('users.is_delete', 0)
            ->orderBy('users.id', 'desc')
            ->paginate(5);

        return $return;
    }

    static function getParents() {
        $return = self::select('users.*')
                    ->where('users.role', 4)
                    ->where('users.is_delete', 0);



        if (!empty(Request::get('name'))) {
            $return = $return->where('users.name', 'like', '%' . Request::get('name') . '%');
        }

        if (!empty(Request::get('last_name'))) {
            $return = $return->where('users.last_name', 'like', '%' . Request::get('last_name') . '%');
        }

        if (!empty(Request::get('email'))) {
            $return = $return->where('users.email', 'like', '%' . Request::get('email') . '%');
        }

        if (!empty(Request::get('gender'))) {
            $return = $return->where('users.gender', '=', Request::get('gender'));
        }

        if (!empty(Request::get('occupation'))) {
            $return = $return->where('users.occupation', 'like', '%' . Request::get('occupation') . '%');
        }

        if (!empty(Request::get('address'))) {
            $return = $return->where('users.address', 'like', '%' . Request::get('address') . '%');
        }

        if (!empty(Request::get('mobile_number'))) {
            $return = $return->where('users.mobile_number', 'like', '%' . Request::get('mobile_number') . '%');
        }

        if (!empty(Request::get('date'))) {
            $return = $return->whereDate('users.created_at', '=', Request::get('date'));
        }

        if (!empty(Request::get('status'))) {
            $return = $return->where('users.status', '=', Request::get('status'));
        }

        $return = $return->orderBy('users.id', 'desc')
                    ->paginate(5);
        return $return;
    }

    static function getSingle($id) {
        return self::find($id);
    }

    static function getEmailSingle($email) {
        return self::where('email','=', $email)->first();
    }

    static function getTokenSingle($token) {
        return self::where('remember_token','=', $token)->first();
    }

    public function getProfilePic($id) {
        $user = self::find($id);
        if (!empty($user->profile_pic) && file_exists('upload/profile' . $user->profile_pic)) {
            return url('upload/profile/' . $user->profile_pic);
        }
        return "";
    }

}
