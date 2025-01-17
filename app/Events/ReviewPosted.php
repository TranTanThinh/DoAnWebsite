<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReviewPosted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

    public $newReview;
    public $ratingDistribution;
    public $totalReviews;
    public $avgRating;
    
    
    public function __construct($newReview, $ratingDistribution, $totalReviews, $avgRating)
    {
        $this->newReview = $newReview;
        $this->ratingDistribution = $ratingDistribution;
        $this->totalReviews = $totalReviews;
        $this->avgRating = $avgRating;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): Channel
    {
        return new Channel('reviews');
    }
}
