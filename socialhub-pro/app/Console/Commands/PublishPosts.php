<?php

namespace App\Console\Commands;

use App\Jobs\PublishPost;
use App\Models\Post;
use Illuminate\Console\Command;

class PublishPosts extends Command
{
    protected $signature = 'posts:publish';
    protected $description = 'Publish scheduled posts';

    public function handle()
    {
        $postsToPublish = Post::where('status', 'scheduled')
                                ->where('scheduled_at', '<=', now())
                                ->get();

        foreach ($postsToPublish as $post) {
            PublishPost::dispatch($post);
        }

        $this->info(count($postsToPublish) . ' posts dispatched for publishing.');
    }
}
