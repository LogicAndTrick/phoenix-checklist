<?php

class ErrorController extends Controller
{
    public function Index($message)
    {
        Templating::SetPageTitle('Log in to continue');
        return $this->View($message);
    }
}

?>
