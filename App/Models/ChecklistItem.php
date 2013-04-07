<?php

class ChecklistItem extends Model
{
    public $table = 'ChecklistItems';
    public $columns = array(
        'ID' => 'ID',
        'ChecklistID' => 'ChecklistID',
        'Text' => 'Text',
        'IsChecked' => 'IsChecked',
        'OrderIndex' => 'OrderIndex',
        'Created' => 'Created'
    );
    public $mappings = array(
        'Created' => 'date',
        'IsChecked' => 'bool'
    );
    public $primaryKey = 'ID';
    public $many = array();
    public $one = array(
        'User' => array('UserID' => 'ID'),
        'Checklist' => array('ChecklistID' => 'ID')
    );
    public $validation = array(
        'ChecklistID' => array(
            'required' => array(
                'message' => 'This checklist item must have an associated checklist.'
            ),
            'datatype' => array(
                'type' => 'int',
                'message' => 'The associated checklist must be the integer ID of the checklist.'
            )
        ),
        'Text' => array(
            'required'
        )
    );

    protected function BeforeInsert()
    {
        $this->Created = Date::Now();
    }


}

?>
