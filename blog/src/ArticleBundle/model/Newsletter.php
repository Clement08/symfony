<?php

namespace ArticleBundle\Models;

class Newsletter
{
    public function __construct($mailer){

        $this->mailer=$mailer;

    }

    public function settParameters($params)
    {
        $this->parmam=$param;
    }

}