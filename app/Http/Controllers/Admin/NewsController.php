<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Post;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
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
