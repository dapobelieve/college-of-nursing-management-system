<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Posts;
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
        $posts = Posts::where('status', 'active')
            ->orderBy('created_at', 'DESC')
            ->orderBy('updated_at', 'DESC')
            ->paginate(10);

        return View('admin.news', ['section' => 'news', 'posts' => $posts]);
    }
}
