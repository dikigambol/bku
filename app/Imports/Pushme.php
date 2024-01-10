<?php

namespace App\Imports;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Pushme implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $pres;

    public function __construct($pres)
    {
        $this->pres = $pres;
    }

    public function broadcastOn()
    {
        return ['tukin-555'];
    }

    public function broadcastAs()
    {
        return 'pesan-tukin';
    }
}
