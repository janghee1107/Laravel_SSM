<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jangbu extends Model
{
    use HasFactory;
	
	protected $fillable = [
	'io31',
	'writeday31',
	'products_id31',
	'price31',
	'numi31',
	'numo31',
	'prices31',
	'bigo31'
	];
}
