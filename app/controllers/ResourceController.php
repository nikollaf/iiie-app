<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Franc
 * Date: 10/9/13
 * Time: 7:02 PM
 * To change this template use File | Settings | File Templates.
 */
class ResourceController extends AuthorizedController
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
        $resources = Resource::all();

        $beginner_resources = Resource::where('level', 'like', 'Beginner')->get();
        $inter_resources = Resource::where('level', 'like', 'Intermediate')->get();
        $advanced_resources = Resource::where('level', 'like', 'Advanced')->get();


        //$user =  User::find(Auth::user()->id);

        return View::make('resources/index', array('inter_resources' => $inter_resources,
            'beginner_resources' => $beginner_resources,
            'advanced_resources' => $advanced_resources
        ));


    }

    /**
     * Show the page to add events
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
            return View::make('resources/add');
        }

        // Show the page.
        //
        return View::make('resources');
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
            'resource_title'            => 'Required',
            'resource_url'              => 'Required',
            'level'                     => 'Required'
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
            $resource = new Resource;
            $resource->resource_title        = Input::get('resource_title');
            $resource->resource_url          = Input::get('resource_url');
            $resource->user_id               = Input::get('user_id');
            $resource->level                 = Input::get('level');
            $resource->save();

            // Redirect to the register page.
            //
            return Redirect::to('resources')->with('success', 'Resource created with success!');
        }

        // Something went wrong.
        //
        return Redirect::to('resources/add')->withInput($inputs)->withErrors($validator->getMessageBag());
    }



}
