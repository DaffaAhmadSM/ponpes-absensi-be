<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $longitude
 * @property string $latitude
 * @property int $default
 * @property string|null $address
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InstanceLocation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InstanceLocation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InstanceLocation query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InstanceLocation whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InstanceLocation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InstanceLocation whereDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InstanceLocation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InstanceLocation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InstanceLocation whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InstanceLocation whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InstanceLocation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InstanceLocation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class InstanceLocation extends Model
{
    protected $guarded = ["id"];
}
