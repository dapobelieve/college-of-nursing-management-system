<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
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
        $posts = [];
        return View('admin.news', ['section' => 'news', 'posts' => $posts]);
    }
}
