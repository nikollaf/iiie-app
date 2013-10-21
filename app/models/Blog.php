<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Franc
 * Date: 10/1/13
 * Time: 6:06 PM
 * To change this template use File | Settings | File Templates.
 */

class Blog extends Eloquent {

    public function user()
    {
        return $this->belongsTo('User');
    }
}