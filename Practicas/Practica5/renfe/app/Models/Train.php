<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    use HasFactory;

    public function TrainType()
    {
        return $this->BelongsTo(TrainType::class);
    }

    public function Tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
