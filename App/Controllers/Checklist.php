<?php

class ChecklistController extends Controller
{
    public $authorise = array(
        'Index' => false,
        '*' => true
    );

    function Index()
    {
        return $this->View();
    }

    function Details($id)
    {
        return $this->View();
    }

    function Check_Post($id, $val)
    {
        return $this->Json('success');
    }

    function Create()
    {
        if (Post::IsPostBack()) {

        }
        return $this->View();
    }

    function Edit($id)
    {
        if (Post::IsPostBack()) {

        }
        return $this->View();
    }

    function Delete($id)
    {
        if (Post::IsPostBack()) {

        }
        return $this->View();
    }
}

?>
