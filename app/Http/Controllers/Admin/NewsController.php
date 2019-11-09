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

        return View('admin.news.index', ['section' => 'news', 'posts' => $posts]);
    }
}
