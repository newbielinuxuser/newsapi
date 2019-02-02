<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\View;

class ArticleEvent implements ShouldBroadcast
{
	use Dispatchable, InteractsWithSockets, SerializesModels;

	private $objArticle;
	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($objArticle)
	{
		$this->objArticle = $objArticle;
	}

	/**
	 * Get the channels the event should broadcast on.
	 *
	 * @return \Illuminate\Broadcasting\Channel|array
	 */
	public function broadcastOn()
	{
		return new Channel('test-event');
	}
	
	public function broadcastWith()
	{
		$strHtml = View("landing/broadcast-post", ['objArticle'=> $this->objArticle])->render();
		return [
			'data' => $strHtml,
			'action' => 'refresh',
		];
	}
}
