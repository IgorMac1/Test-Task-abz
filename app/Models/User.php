<?php

namespace App\Models;

use App\Helpers\Enums\ProfessionEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $table = 'users';

    protected $fillable = [
        'full_name',
        'employment_date',
        'phone',
        'email',
        'salary',
        'photo',
        'manager_id',
        'admin_created_id',
        'admin_updated_id',
        'profession_id'
    ];

    public function profession()
    {
        return $this->belongsTo(Profession::class,'profession_id','id');
    }

    public function adminCreated()
    {
        return $this->belongsTo(Admin::class,'admin_created_id','id');
    }

    public function adminUpdated()
    {
        return $this->belongsTo(Admin::class,'admin_updated_id','id');
    }

    public function manager()
    {
        return $this->hasMany(User::class,'manager_id','id');
    }

    public function employee()
    {
        return $this->belongsTo(User::class,'manager_id','id');
    }


}
