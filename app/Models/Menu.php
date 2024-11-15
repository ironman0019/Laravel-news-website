<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    // Relation with children
    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    // Relation with parent
    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }


}
