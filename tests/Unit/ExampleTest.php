<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Post;

class ExampleTest extends TestCase
{
	use DatabaseTransaction;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {

       //$this->assertTrue(true);
       
       //Given I have two records in he database that are posts
       //and each one is posted a month apart.
       
       $first = factory(Post::class)->create();

       $second = factory(Post::class)->create([

       	    'created_at' => \Carbon\Carbon::now()->subMonth()

       	]);
       
       //when I fetch the archives.
       
       $posts = Post::archives();
       
       
       //Then the response should be in the proper format
       
       $this->assertEquals([

       	    [
       	        'year' => $first->created_at->format('Y'), 
       	        'month' => $first->created_at->format('F'), 
                'published' => 1
       	    ], 

       	    [
                'year' => $second->created_at->format('Y'),
                'month' => $second->created_at->format('F'),
                'published' => 1
       	    ], 

       ],$posts);
    }
}
