<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * Class Article
 * @package App\Models
 */
class Article extends Model
{
    use HasFactory;

//    public function getRouteKeyName()
//    {
//        return 'id';
//    }

    protected $fillable = ['title', 'body', 'excerpt'];

//    protected $guarded = [];

    /**
     * @return string
     */
    public function path(): string
    {
        return route('articles.show', $this);
    }

    /**
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
