<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


use Illuminate\Database\Eloquent\Model;


class Team extends Model
{
    use HasFactory;
    
    protected $fillable=['name_team','image'];
    public $timestamps=false;

    public static function boot() {

        parent::boot();

        static::saving(function () {
            \Cache::flush();

        } );
        static::updating(function () {
            \Cache::flush();

        } );
        static::deleting(function(){\Cache::flush();});
    }

}