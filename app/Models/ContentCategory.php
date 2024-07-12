<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\HasScopeActive;
use DateTimeInterface;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ContentCategory extends Model implements HasMedia
{
    use SoftDeletes;
    use Auditable;
    use InteractsWithMedia;
    use HasScopeActive;

    public $table = 'content_categories';

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public const STATUS_RADIO = [
        'active'   => 'Ativo',
        'inactive' => 'Inativo',
    ];

    protected $fillable = [
        'type_category_id',
        'name',
        'slug',
        'status',
    ];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('webp')->format('webp');
    }

    public function type_category(): BelongsTo
    {
        return $this->belongsTo(TypeCategory::class, 'type_category_id');
    }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'content_category_post');
    }

    public function url(): Attribute
    {
        return Attribute::make(
            get: fn () => route('site.posts.category', ['categoryPost' => $this->slug])
        )->shouldCache();
    }

    public function photo(): Attribute
    {
        return Attribute::make(
            get: function () {
                $file = $this->getMedia('photo')->last();
                if ($file) {
                    $file->url  = $file->getUrl('webp') ?? $file->getUrl();
                } else {
                    $file = new Media();
                    $file->url  = asset('images/site/favicon.png');
                    $file->webp = asset('images/site/favicon.png');
                }

                return $file;
            }
        )->shouldCache();
    }

    public function scopeIsBlog(Builder $query): Builder
    {
        return $query->whereHas('type_category', function ($query) {
            $query->where('id', 2);
        });
    }

}
