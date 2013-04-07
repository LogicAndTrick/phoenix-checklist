<?php

class User extends Model
{
    public $table = 'Users';
    public $columns = array(
        'ID'         => 'ID',
        'Name'       => 'Name',
        'Email'      => 'Email',
        'OpenID'     => 'OpenID',
        'Cookie'     => 'Cookie'
    );
    public $primaryKey = 'ID';
    public $one = array();
    public $many = array(
        'Checklist' => array('ID' => 'UserID')
    );
    public $validation = array(
        'Name' => array(
            'required',
            'db-unique'
        ),
        'Password' => array('required')
    );
}

?>
