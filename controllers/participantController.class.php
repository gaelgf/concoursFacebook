<?php


class participantController
{
    public function saveAction($args)
    {
        $participant = new participant( "", "27", "123456", "thibault", "jullion", "1990-04-15", true);
        $participant->save();
    }
}