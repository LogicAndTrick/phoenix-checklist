<?php

class ChecklistController extends Controller
{
    public $authorise = array(
        'Register' => false,
        '*' => true
    );

    public $allow_register = false;

    public function Register()
    {
        if (!$this->allow_register || Authentication::IsLoggedIn()) {
            return $this->RedirectToAction('Index', 'Checklist');
        }
        if (Authentication::ValidateRegister()) {
            Authentication::RegisterUser();
            return $this->RedirectToAction('Index', 'Checklist');
        }
        return $this->View();
    }

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
