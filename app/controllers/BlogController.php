<?php

class BlogController extends AuthorizedController
{
    /**
     * Let's whitelist all the methods we want to allow guests to visit!
     *
     * @access   protected
     * @var      array
     */

    protected $whitelist = array(
        'getIndex'

    );


    /**
     * Main users page.
     *
     * @access   public
     * @return   View
     */
    public function getIndex()
    {
        // show the page with blogs
       // $blogs = Blog::all()->paginate(2);

        //$blogs = Blog::paginate(4)->orderBy('created_at', 'DESC');

        $blogs = Blog::take(4)->orderBy('created_at', 'DESC')->paginate(4);
        //$users = User::where('votes', '>', 100)->paginate(15);


        return View::make('blogs/index')->with('blogs', $blogs);


    }

    public function getBlog($id)
    {
        $blog = Blog::find($id);

        $blogs = Blog::all();

        return View::make('blogs.blog', array('blog' => $blog, 'blogs' => $blogs));
    }


    /**
     * Show the page to add blogs
     *
     * @access   public
     * @return   View
     */
    public function getAdd()
    {
        // Are we logged in?
        //
        if (Auth::check())
        {
            return View::make('blogs/add');
        }

        // Show the page.
        //
        return View::make('blogs');
    }

    /**
     * User account creation form processing.
     *
     * @access   public
     * @return   Redirect
     */
    public function postAdd()
    {
        // Declare the rules for the form validation.
        //
        $rules = array(
            'title'                    => 'Required | max:120',
            'content'                 => 'Required',


        );

        // Get all the inputs.
        //
        $inputs = Input::all();

        // Validate the inputs.
        //
        $validator = Validator::make($inputs, $rules);

        // Check if the form validates with success.
        //
        if ($validator->passes())
        {
            // Create the blog.
            //


            $blog = new Blog;
            $blog->title        = Input::get('title');
            $blog->content      = Purifier::clean(Input::get('content'));
            $blog->user_id      = Input::get('user_id');

            $blog->save();

            // Redirect to the register page.
            //
            return Redirect::to('blogs')->with('success', 'Account created with success!');
        }

        // Something went wrong.
        //
        return Redirect::to('blogs/add')->withInput($inputs)->withErrors($validator->getMessageBag());
    }


}