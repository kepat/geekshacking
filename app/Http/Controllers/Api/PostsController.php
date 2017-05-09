<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Post instance.
     *
     * @access protected
     * @type   Post
     */
    protected $post;

    /**
     * Post controller constructor.
     *
     * @param  Post $post
     *
     * @access public
     */

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get all the posts.
     * Web Service External API.
     *
     * @access public
     * @return JsonResponse
     */
    public function index()
    {
        // Get all the post
        $posts = $this->post->all();

        return $this->jsonResult(1, $posts, "Success");
    }

    /**
     * Store the post.
     * Web Service External API.
     *
     * @param Request $request
     *
     * @access public
     * @return JsonResponse
     */
    public function store(Request $request)
    {

        // Make sure the needed data is passed
        if (!$request->has(['title', 'details', 'price', 'posted_by'])) {
            return $this->jsonResult(0, [], 'Missing parameters');
        }

        // Create a new post
        $post = new Post();
        $post->title = $request->get('title');
        $post->details = $request->get('details');
        $post->price = $request->get('price');
        $post->posted_by = $request->get('posted_by');
        $post->save();

        return $this->jsonResult(1, $post, 'Success');
    }

}