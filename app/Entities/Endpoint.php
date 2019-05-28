<?php
/**
 * Created by PhpStorm.
 * User: suhar
 * Date: 2019-03-25
 * Time: 19:49
 */

namespace App\Entities;


use Jenssegers\Mongodb\Eloquent\Model;

class Endpoint extends Model
{

    protected $collection = 'endpoints';
    protected $casts = [
        'success' => 'boolean',
        'status' => 'integer'
    ];
    protected $fillable = ['name', 'method', 'response', 'url', 'success', 'status', 'header'];


}
