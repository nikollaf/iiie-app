<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Franc
 * Date: 10/9/13
 * Time: 7:02 PM
 * To change this template use File | Settings | File Templates.
 */

class Event extends Eloquent
{
    public function user()
    {
        return $this->belongsTo('User');
    }

}