<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PersonalInformation extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'cv', 'image', 'email'];

    protected function cvUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => Storage::disk('cv')->url($this->cv ?? 'my-cv.pdf'),
        );
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => Storage::disk('hero')->url($this->image ?? 'default-hero.jpg'),
        );
    }
}
