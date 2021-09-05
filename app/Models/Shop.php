<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable=['name','user_id','description','city_id','province_id',];

    public const DRAFT = 0;
	public const ACTIVE = 1;
	public const INACTIVE = 2;

	public const STATUSES = [
		self::DRAFT => 'draft',
		self::ACTIVE => 'active',
		self::INACTIVE => 'inactive',
	];

    public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

    public function scopeForUser($query, $user)
	{
		return $query->where('user_id', $user->id);
	}

    public function products()
    {
        return $this->hasMany(Product::class, 'shop_id');
    }

    public static function statuses(){
        return self::STATUSES;
    }

    /**
	 * Get status label
	 *
	 * @return string
	 */
	public function statusLabel()
    {
        $statuses = $this->statuses();

        return isset($this->status) ? $statuses[$this->status] : null;
	}
}
