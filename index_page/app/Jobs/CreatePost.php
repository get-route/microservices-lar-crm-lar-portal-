<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreatePost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $post;
    /**
     * Create a new job instance.
     */
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Post::create([
            'title'=>$this->post['title'],
            'descriptions'=>$this->post['descriptions'],
            'url'=>$this->post['url'],
            'images'=>$this->post['images'],
        ]);
    }
}
