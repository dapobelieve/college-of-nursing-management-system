<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

use App\Models\Post;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * @var array $response Template for json response to be returned to the user for an ajax call */
    protected $response = [
        'ok' => false,
        'message' => '',
        'data' => [
            'reload' => false,
            'redirect' => null
        ]
    ];

    /**
     * Shows all blog posts
     * 
     * @return View
     */
    public function index()
    {
        $posts = Post::where('status', 'active')
            ->orderBy('created_at', 'DESC')
            ->orderBy('updated_at', 'DESC')
            ->paginate(10);

        return View('admin.news.index', ['section' => 'news', 'sub_section' => 'all', 'posts' => $posts]);
    }

    /**
     * Shows the create post page
     * 
     * @return View
     */
    public function create()
    {
        return View('admin.news.create', ['section' => 'news', 'sub_section' => 'create']);
    }

    /**
     * Handles post creation ajax call
     * 
     * @return array
     */
    public function handleCreate(Request $request)
    {
        try {
            // Validate request
            $this->validate($request, [
                'title' => 'required|unique:news,title|max:255',
                'content' => 'required',
            ]);

            // Create the post
            $post = new Post();
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->author_id = 0; // Stub
            $post->save();

            $this->response['ok'] = true;
            $this->response['message'] = 'Post created!';
            $this->response['data']['redirect'] = '/admin/news';
        } catch (ValidationException $e) {
            $this->response['message'] = $e->errors()[0];
        }

        // Response
        return $this->response;
    }

    /**
     * Shows the edit post page
     * 
     * @return View
     */
    public function edit(Post $post)
    {
        return View('admin.news.edit', ['section' => 'news', 'post' => $post]);
    }

    /**
     * Handles post editing ajax call
     * 
     * @return array
     */
    public function handleEdit(Post $post)
    {

    }
}
