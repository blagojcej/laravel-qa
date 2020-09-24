<?php
/**
 * laravel-qa - VotableTrait.php
 *
 * Initial version by: BLAGOJCE
 * Initial version created on: 23.9.2020
 */

namespace  App;

trait VotableTrait {

    public function votes()
    {
        return $this->morphToMany(User::class, 'votable');
    }

    public function upVotes()
    {
        return $this->votes()->wherePivot('vote', 1);
    }

    public function downVotes()
    {
        return $this->votes()->wherePivot('vote', -1);
    }
}
