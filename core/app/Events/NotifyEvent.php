<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotifyEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

   public $message;
   public $create;
   public $realtime_id;

  public function __construct($message,$create,$realtime_id)
  {

      $this->message = $message;
      $this->create = $create;
      $this->realtime_id = $realtime_id;
  }

  public function broadcastOn()
  {
      return ['notify_channel'];
  }

  public function broadcastAs()
  {
      return 'notify_event';
  }
  
}
