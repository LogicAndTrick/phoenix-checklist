<?php

class Checklist extends Model
{
    public $table = 'Checklists';
    public $columns = array(
        'ID' => 'ID',
        'UserID' => 'UserID',
        'Title' => 'Title',
        'Created' => 'Created'
    );
    public $mappings = array(
        'Created' => 'date'
    );
    public $primaryKey = 'ID';
    public $many = array(
        'ChecklistItem' => array('ID' => 'ChecklistID', ':Order' => 'OrderIndex')
    );
    public $one = array(
        'User' => array('UserID' => 'ID')
    );
    public $validation = array(
        'UserID' => array(
            'required' => array(
                'message' => 'This checklist must have an associated user.'
            ),
            'datatype' => array(
                'type' => 'int',
                'message' => 'The associated user must be the integer ID of the user.'
            )
        ),
        'Title' => array(
            'required',
            'stringrange' => array(
                'min' => 1,
                'max' => 256
            ),
            'db-unique' => array(
                'fields' => 'UserID',
                'message' => 'The checklist title must be unique in the database.'
            )
        )
    );

    protected function BeforeInsert()
    {
        $this->Created = Date::Now();
    }


}

?>
