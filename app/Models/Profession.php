<?php

namespace App\Models;

use App\Helpers\Enums\ProfessionEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profession extends Model
{
    use HasFactory;

    protected $table = 'professions';

    protected $fillable = [
        'profession',
        'admin_created_id',
        'admin_updated_id'
    ];

    public function users()
    {
        return $this->hasMany(User::class,'profession_id','id');
    }

    public function adminCreatedProfession(): BelongsTo
    {
        return $this->belongsTo(Admin::class,'admin_created_id','id');
    }

    public function adminUpdatedProfession()
    {
        return $this->belongsTo(Admin::class,'admin_created_id','id');
    }

    protected function getProfession($query, $profession )
    {
        return $query->where(
            'profession',
            '=',
            ProfessionEnum::findByKey(ucfirst($profession))->value
        );
    }
}
