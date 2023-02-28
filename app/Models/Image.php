<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'file',
        'title',
        'dimension',
        'slug',
        'user_id',
    ];

    protected static function booted()
    {
        static::creating(function ($image) {
            if ($image->title) {
                $image->slug = $image->getSlug();
                $image->is_published = true;
            }
        });

        static::updating(function ($image) {
            if ($image->title && !$image->slug) {
                $image->slug = $image->getSlug();
                $image->is_published = true;
            }
        });

        static::deleted(function ($image) {
            if (Storage::exists($image->file)) {
                Storage::delete($image->file);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getSlug()
    {
        $slug = str()->slug($this->title);
        $slugsFoundCount = static::where('slug', 'regexp', "^" . $slug . "(-[0-9])?")->count();

        if ($slugsFoundCount > 0) {
            $slug .= '_' . ($slugsFoundCount + 1);
        }

        return $slug;
    }

    public static function allowedImageTypes()
    {
        return ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/svg+xml'];
    }

    public static function makeDayDirectory()
    {
        $subFolder = 'images/' . date('Y/m/d');
        Storage::makeDirectory($subFolder);
        return $subFolder;
    }

    public static function getType($image)
    {
        $path = Storage::path($image);
        return mime_content_type($path);
    }

    public static function getDimensions($image)
    {
        $path = Storage::path($image);
        [$width, $height] = getimagesize($path);
        return $width . 'x' . $height;
    }

    public function permalink()
    {
        return $this->slug ? route('images.show', $this->slug) : '#';
    }

    public function getUrl()
    {
        return str_contains($this->file, 'http') ? $this->file : Storage::url($this->file);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function route($method, $key = 'id')
    {
        return route("images.{$method}", $this->$key);
    }

    public function uploadDate()
    {
        return $this->created_at->diffForHumans();
    }
}
