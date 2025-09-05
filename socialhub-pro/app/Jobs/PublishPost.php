<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class PublishPost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @param \App\Models\Post $post
     */
    public function __construct(public Post $post)
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        try {
            // Placeholder for actual publishing logic
            // This would use a Twitter client/SDK to post the content
            // using the token from $this->post->socialAccount->token
            Log::info("Publishing post {$this->post->id} to {$this->post->socialAccount->provider_name}: {$this->post->content}");

            // Simulate success
            $this->post->update([
                'status' => 'posted',
                'posted_at' => now(),
            ]);

        } catch (\Exception $e) {
            Log::error("Failed to publish post {$this->post->id}: {$e->getMessage()}");
            $this->post->update(['status' => 'failed']);
            // Optionally, re-throw the exception to have the job fail and retry
            // throw $e;
        }
    }
}
