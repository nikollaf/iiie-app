<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Franc
 * Date: 10/9/13
 * Time: 7:02 PM
 * To change this template use File | Settings | File Templates.
 */
class ArticleController extends AuthorizedController
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
        $articles = Article::where('article_status','LIKE', 'APPROVED')->orderBy('created_at', 'DESC')->paginate(6);

        //$user =  User::find(Auth::user()->id);

        return View::make('articles/index')->with('articles', $articles);


    }

    public function getAdmin($id)
    {
        $article = Article::find($id);



        if (Auth::user()->getRole() == 'admin')
        {
            return View::make('articles/article', array('article' => $article));
        }
        else
        {
            header('Location: /articles');
            exit();
        }
        // Show the page.
        //
        header('Location: /');
        exit();
    }

    /**
     * Show the edit page
     *
     * @access   public
     * @return   Redirect
     */
    public function postAdmin()
    {
        // Declare the rules for the form validation.
        //
        $rules = array(
            'article_status' => 'Required'
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
            $article                     =  Article::find(Input::get('article_id'));
            $article->article_status     =  Input::get('article_status');
            $article->save();

            // Redirect to the event page.
            //
            return Redirect::to('articles')->with('success', 'Article updated with success!');
        }

        // Something went wrong.
        //
        return Redirect::to('articles/admin/' . Input::get('article_id'))->withInput($inputs)->withErrors($validator->getMessageBag());
    }


    /**
     * Show the page to add articles
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
            return View::make('articles/add');
        }

        // Show the page.
        //
        return View::make('articles');
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
            'article_title'            => 'Required | max:140',
            'article_info'             => 'Required | max:250',
            'article_url'               => 'Required'
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
            $article = new Article;
            $article->article_title          = Input::get('article_title');
            $article->article_info           = Input::get('article_info');
            $article->article_url             = Input::get('article_url');
            $article->user_id                = Input::get('user_id');
            $article->save();

            // Redirect to the register page.
            //
            return Redirect::to('articles')->with('success', 'Account created with success!');
        }

        // Something went wrong.
        //
        return Redirect::to('articles/add')->withInput($inputs)->withErrors($validator->getMessageBag());
    }


}