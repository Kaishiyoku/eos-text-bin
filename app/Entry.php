<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

/**
 * App\Entry
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entry query()
 * @mixin \Eloquent
 */
class Entry extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::uuid4();
            $model->uuid_delete = Uuid::uuid5(Uuid::uuid1(), Str::random());
        });
    }
}
