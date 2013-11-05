<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Franc
 * Date: 10/9/13
 * Time: 7:02 PM
 * To change this template use File | Settings | File Templates.
 */
class EventController extends AuthorizedController
{
    /**
     * Let's whitelist all the methods we want to allow guests to visit!
     *
     * @access   protected
     * @var      array
     */
    protected $whitelist = array(
        'getIndex',
        'getEvent'
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


        $events = Event::where('event_status','LIKE', 'APPROVED')->orderBy('created_at', 'DESC')->paginate(9);

        //$user =  User::find(Auth::user()->id);



        return View::make('events/index')->with('events', $events);


    }


    public function getEvent($id)
    {
        $event = Event::find($id);

        //$this->layout->content = View::make('events.event');

        return View::make('events.event', array('event' => $event));
    }

    public function getAdmin($id)
    {
        $event = Event::find($id);



        if (Auth::user()->getRole() == 'admin')
        {
            return View::make('events/admin', array('event' => $event));
        }
        else
        {
            header('Location: /events');
            exit();
        }

        // Show the page.
        //
        return URL::to('/');
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
            'event_status' => 'Required'
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
            $event                   =  Event::find(Input::get('event_id'));
            $event->event_status     =  Input::get('event_status');
            $event->save();

            // Redirect to the event page.
            //
            return Redirect::to('events')->with('success', 'Event updated with success!');
        }

        // Something went wrong.
        //
        return Redirect::to('events/admin/' . Input::get('event_id'))->withInput($inputs)->withErrors($validator->getMessageBag());
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
            return View::make('events/add');
        }

        // Show the page.
        //
        return View::make('events');
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
            'event_title'            => 'Required',
            'event_info'             => 'Required | max:220',
            'start_time'             => 'Required'
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
            $event = new Event;
            $event->event_title          = Input::get('event_title');
            $event->event_info           = Input::get('event_info');
            $event->event_url            = Input::get('event_url');
            $event->start_date           = Input::get('start_date');
            $event->end_date             = Input::get('end_date');
            $event->address              = Input::get('address');
            $event->state                = Input::get('state');
            $event->zipcode              = Input::get('zipcode');
            $event->city                 = Input::get('city');
            $event->start_time           = Input::get('start_time');
            $event->end_time             = Input::get('end_time');
            $event->user_id              = Input::get('user_id');
            $event->save();

            // Redirect to the register page.
            //
            return Redirect::to('events')->with('success', 'Account created with success!');
        }

        // Something went wrong.
        //
        return Redirect::to('events/add')->withInput($inputs)->withErrors($validator->getMessageBag());
    }
}