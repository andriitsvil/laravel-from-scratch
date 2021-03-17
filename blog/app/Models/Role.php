<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * Class Role
 * @package App\Models
 */
class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['name'];

    /**
     * @return BelongsToMany
     */
    public function abilities(): BelongsToMany
    {
        return $this->belongsToMany(Ability::class)->withTimestamps();
    }

    public function allowTo($ability)
    {
        if (is_string($ability)) {
            $ability = Ability::whereName($ability)->firstOrFail();
        }
//        $this->abilities()->save($ability);
        $this->abilities()->sync($ability, false);
    }
}
