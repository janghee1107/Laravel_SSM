<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
	
	protected $fillable = [
	'uid31',
	'pwd31',
	'name31',
	'tel31',
	'rank31'
	];
}
