<?php


class participantController
{
    public function saveAction($args)
    {
        //$participant = new participant( NULL, "27", "123456", "thibault", "jullion", "1990-04-15", true);
        $thibault = participant::loadById(1);
        var_dump($thibault);
        echo $thibault->isParticipatingToCampagne(27);
    }
}