<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\Post;
use App\Http\Controllers\Controller;

/**
 * Handles the news section of the admin panel
 */
class NewsController extends Controller
{
    /**
     * Template for json response to be returned to the user for an ajax call
     * @var array $response
     */
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
     * @param Request $request The HTTP request instance
     * @return array
     */
    public function store(Request $request)
    {
        // validate input
        $validator = Validator::make($request->input(), [
            'title' => 'required|unique:news,title|max:255',
            'content' => 'required',
        ]);

        if ($validator->fails()) { // If validation fails
            $this->response['message'] = $validator->messages()->first();
        } else { // If validation is successful
            $post = new Post();
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->author_id = Auth::user()->id;
            $post->save();

            $this->response['ok'] = true;
            $this->response['message'] = 'Post created!';
            $this->response['data']['redirect'] = '/admin/news';
        }

        // Response
        return $this->response;
    }

    /**
     * Shows the edit post page
     * 
     * @param Post $post The post to be edited
     * @return View
     */
    public function edit(Post $post)
    {
        return View('admin.news.edit', ['section' => 'news', 'post' => $post]);
    }

    /**
     * Handles post editing ajax call
     * 
     * @param Request $request The HTTP request instance
     * @param Post $post The post to be edited
     * @return array
     */
    public function update(Request $request, Post $post)
    {
        // validate input
        $validator = Validator::make($request->input(), [
            'title' => "required|unique:news,title,$post->id|max:255",
            'content' => 'required',
        ]);

        if ($validator->fails()) { // If validation fails
            $this->response['message'] = $validator->messages()->first();
        } else { // If validation is successful
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->save();

            $this->response['ok'] = true;
            $this->response['message'] = 'Post updated!';
        }

        // Response
        return $this->response;
    }
}
