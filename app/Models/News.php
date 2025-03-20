<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'news';
    protected $fillable = ['id', 'title', 'content', 'image', 'published', 'user_id', 'category_id', 'created_at', 'updated_at'];

    public function title(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => mb_ucfirst($value),
            set: fn (string $value) => mb_ucfirst($value)
        );
    }
    public function content(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => mb_ucfirst($value),
            set: fn (string $value) => mb_ucfirst($value)
        );
    }
    public function categoryId(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => (int)$value,
            set: fn (string $value) => (int)$value
        );
    }
    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class, 'news_id', 'id');
    }
    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function published(): bool
    {
        return $this->published;
    }
    public function casts(): array
    {
        return [
            'published' => 'boolean',
            'category_id' => 'integer'
        ];
    }
}
