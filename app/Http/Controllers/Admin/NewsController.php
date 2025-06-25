<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Traits\CloudinaryUpload;

use App\Alert;
use App\Models\Post;
use App\Http\Controllers\Controller;

/**
 * Handles the news section of the admin panel
 */
class NewsController extends Controller
{
    use CloudinaryUpload;
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
        $validator = Validator::make($request->input(), [
            'title' => 'required|unique:news,title',
            'body'  => 'required'
        ]);
        //dd($request->body);
        if ($validator->fails()) { // If validation fails
            $this->response['message'] = $validator->messages()->first();
          }
          else {
            $post = Post::create([
                'title' => $request->title,
                'body' => $request->body,
                'rich_body' => $request->richBody,
            ]);

            if ($request->image != 'undefined'){
                $imageData = $this->upload($request->image, 'news', 800, '', 'auto');
                $post->images()->create([
                    'url' => $imageData['secure_url']
                ]);
            }
            $this->response['ok'] = true;
            $this->response['message'] = 'Post Created!!';
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
            'title' => "required|max:255",
            'body' => 'required',
        ]);

        if ($validator->fails()) { // If validation fails
            $this->response['message'] = $validator->messages()->first();
        } else { // If validation is successful
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->rich_body = $request->input('richBody');
            $post->save();

            $this->response['ok'] = true;
            $this->response['message'] = 'Post updated!';
        }

        // Response
        return $this->response;
    }
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        $notification = Alert::alertMe('Post deleted!', 'success');
        return redirect()->route('news.index')->with($notification);
    }
}
