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
        $lists = Query::Create('Checklist')
                    ->Where('UserID', '=', Authentication::GetUserID())
                    ->OrderBy('Created', 'DESC')
                    ->All();
        return $this->View($lists);
    }

    function Details($id)
    {
        $list = Query::Create('Checklist')
                    ->Where('UserID', '=', Authentication::GetUserID())
                    ->Where('ID', '=', $id)
                    ->One();
        if ($list->ID === null) {
            return $this->RedirectToAction('Index');
        }
        return $this->View($list);
    }

    function Create()
    {
        if (Post::IsPostBack()) {
            $list = Post::Bind('Checklist', '', array('Title'));
            $list->UserID = Authentication::GetUserID();
            if (Validation::Validate($list)) {
                $list->Save();
                $quick_add = trim(Post::Get('Items'));
                if ($quick_add != '') {
                    $lines = explode("\n", $quick_add);
                    $i = 0;
                    foreach ($lines as $line) {
                        if (trim($line) == '') continue;
                        $item = new ChecklistItem();
                        $item->ChecklistID = $list->ID;
                        $item->Text = trim($line);
                        $item->IsChecked = false;
                        $item->OrderIndex = $i++;
                        $item->Save();
                    }
                }
                return $this->RedirectToAction('Details', 'Checklist', $list->ID);
            }
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

    function CreateItem($id)
    {
        $list = new Checklist($id);
        if (Post::IsPostBack()) {
            $model = Post::Bind('ChecklistItem', '', array('Text'));
            $model->ChecklistID = $id;
            $model->IsChecked = false;
            $max = -1;
            foreach ($list->Find('ChecklistItem') as $item) {
                if ($item->OrderIndex > $max) $max = $item->OrderIndex;
            }
            $model->OrderIndex = $max + 1;
            if (Validation::Validate($model)) {
                $model->Save();
                return $this->RedirectToAction('Details', 'Checklist', $model->ChecklistID);
            }
        }
        $this->viewData['list'] = $list;
        return $this->View($model);
    }

    function EditItem($id)
    {
        $model = new ChecklistItem($id);
        if (Post::IsPostBack()) {
            Post::Bind($model, '', array('Text'));
            if (Validation::Validate($model)) {
                $model->Save();
                return $this->RedirectToAction('Details', 'Checklist', $model->ChecklistID);
            }
        }
        $this->viewData['list'] = $model->Get('Checklist');
        return $this->View($model);
    }

    function DeleteItem($id)
    {
        $model = new ChecklistItem($id);
        if (Post::IsPostBack()) {
            $model->Delete();
            return $this->RedirectToAction('Details', 'Checklist', $model->ChecklistID);
        }
        $this->viewData['list'] = $model->Get('Checklist');
        return $this->View($model);
    }

    function CheckItem($id)
    {
        $model = new ChecklistItem($id);
        $model->IsChecked = true;
        $model->Save();
        return $this->RedirectToAction('Details', 'Checklist', $model->ChecklistID);
    }

    function UncheckItem($id)
    {
        $model = new ChecklistItem($id);
        $model->IsChecked = false;
        $model->Save();
        return $this->RedirectToAction('Details', 'Checklist', $model->ChecklistID);
    }

    function UpItem($id) {
        $model = new ChecklistItem($id);
        $list = $model->Get('Checklist');
        $items = $list->Find('ChecklistItem');
        for ($i = 1; $i < count($items); $i++) {
            $t = $items[$i-1];
            $n = $items[$i];
            if ($n->ID == $id) {
                $order = $n->OrderIndex;
                $n->OrderIndex = $t->OrderIndex;
                $t->OrderIndex = $order;
                $t->Save();
                $n->Save();
                break;
            }
        }
        return $this->RedirectToAction('Details', 'Checklist', $list->ID);
    }

    function DownItem($id) {
        $model = new ChecklistItem($id);
        $list = $model->Get('Checklist');
        $items = $list->Find('ChecklistItem');
        for ($i = 1; $i < count($items); $i++) {
            $t = $items[$i];
            $n = $items[$i-1];
            if ($n->ID == $id) {
                $order = $n->OrderIndex;
                $n->OrderIndex = $t->OrderIndex;
                $t->OrderIndex = $order;
                $t->Save();
                $n->Save();
                break;
            }
        }
        return $this->RedirectToAction('Details', 'Checklist', $list->ID);
    }
}

?>
