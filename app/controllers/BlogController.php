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



        $blogs = Blog::where('blog_post_status','LIKE', 'APPROVED')->orderBy('created_at', 'DESC')->paginate(4);
        //$users = User::where('votes', '>', 100)->paginate(15);


        return View::make('blogs/index')->with('blogs', $blogs);


    }

    public function getNote($id)
    {
        $blog = Blog::find($id);

        $blogs = Blog::all();

        return View::make('blogs.note', array('blog' => $blog, 'blogs' => $blogs));
    }



    /**
     * Show the edit page
     *
     * @access   private
     * 
     */
    public function getEdit($id)
    {
         $blog = Blog::find($id);

         //$admin = User::where('user_role', 'LIKE', 'admin')->get();
        //
        if (Auth::user()->getRole() == 'admin')
        {
            return View::make('blogs/add', array('blog' => $blog));
        }
        else
        {
            header('Location: /notes');
            exit();
        }

        // Show the page.
        //
        return View::make('/');
    }

    /**
     * Show the edit page
     *
     * @access   public
     * @return   Redirect
     */
    public function postEdit()
    {
        // Declare the rules for the form validation.
        //
        $rules = array(
            'blog_post_status' => 'Required'
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
            // Create the user.
            //
            $blog                   =  Blog::find(Input::get('blog_id'));
            $blog->blog_post_status = Input::get('blog_post_status');
            $blog->save();

            // Redirect to the register page.
            //
            return Redirect::to('notes')->with('success', 'Blog updated with success!');
        }

        // Something went wrong.
        //
        return Redirect::to('notes/edit/' . Input::get('blog_id'))->withInput($inputs)->withErrors($validator->getMessageBag());
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
        return View::make('notes');
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
            return Redirect::to('notes')->with('success', 'Thank you! We will show your blog as soon as it gets approved');
        }

        // Something went wrong.
        //
        return Redirect::to('notes/add')->withInput($inputs)->withErrors($validator->getMessageBag());
    }


}