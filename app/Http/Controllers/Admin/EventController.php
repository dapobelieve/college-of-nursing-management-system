<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Http\Traits\CloudinaryUpload;

use Carbon\Carbon;
use App\Alert;
use App\Models\Event;


class EventController extends Controller
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
      $posts = Event::orderBy('created_at', 'DESC')
          ->orderBy('updated_at', 'DESC')
          ->paginate(10);

      return View('admin.events.index', ['section' => 'events', 'sub_section' => 'all', 'posts' => $posts]);
  }

  /**
   * Shows the create post page
   *
   * @return View
   */
  public function create()
  {
      return View('admin.events.create', ['section' => 'events', 'sub_section' => 'create']);
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
          'title' => 'required|unique:events,title',
          'details'  => 'required',
          'date' => 'required|date'
      ]);
      //check to by validating image
      if ($request->image != 'undefined'){
        $validator = Validator::make($request->input(), [
            'image' => 'image|max:250',
        ]);
      }

      if ($validator->fails()) { // If validation fails
          $this->response['message'] = $validator->messages()->first();
        }
        else {
          $post = Event::create([
              'title' => $request->title,
              'details' => $request->details,
              'expiry_date' => $request->date,
          ]);

          if ($request->image != 'undefined'){
              $imageData = $this->upload($request->image, 'events', 3600, '', 'auto');
              $post->images()->create([
                  'url' => $imageData['secure_url']
              ]);
          }
          $this->response['ok'] = true;
          $this->response['message'] = 'Event Created!!';
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
  public function edit(Event $post)
  {
      return View('admin.events.edit', ['section' => 'events', 'post' => $post]);
  }

  /**
   * Handles post editing ajax call
   *
   * @param Request $request The HTTP request instance
   * @param Post $post The post to be edited
   * @return array
   */
  public function update(Request $request, Event $post)
  {
      // validate input
      $validator = Validator::make($request->input(), [
          'title' => "required|max:255",
          'content' => 'required',
          'date' => 'required|date'
      ]);

      if ($validator->fails()) { // If validation fails
          $this->response['message'] = $validator->messages()->first();
      } else { // If validation is successful
          $post->title = $request->input('title');
          $post->details = $request->input('content');
          $post->expiry_date = $request->input('date');
          $post->save();

          $this->response['ok'] = true;
          $this->response['message'] = 'Event updated!';
      }

      // Response
      return $this->response;
  }
}
