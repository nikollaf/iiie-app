<?php

class Resource extends Eloquent {

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function beginner()
    {

    }
}