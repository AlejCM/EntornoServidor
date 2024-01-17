<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function Train()
    {
        return $this->BelongsTo(Train::class);
    }

    public function TicketType()
    {
        return $this->BelongsTo(TicketType::class);
    }
}
