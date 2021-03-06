<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatedKey extends Model
{
    use HasFactory;

    protected $table = 'related_key';

    protected $fillable = ['site_id','keyword_id','related_site'];

    public function initSeo()
    {
        return $this->belongsTo(InitSeo::class);
    }
}
