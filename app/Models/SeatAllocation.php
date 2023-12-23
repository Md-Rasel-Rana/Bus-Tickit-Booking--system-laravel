<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatAllocation extends Model
{
 
    protected $fillable = ['user_id', 'trip_id', 'seat_number','From_location','To_location','Bus_name'];
}
