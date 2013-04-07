<div class="breadcrumb">
    <li>{actlink text=Checklists action=Index} <span class="divider">&gt;</span></li>
    <li>{actlink text=$list->Title action=Details id=$list->ID} <span class="divider">&gt;</span></li>
    <li class="active">Delete Item</li>
</div>
<h2>Delete Item</h2>
{form}
    <p>
        Are you sure you want to delete this checklist item?
        {$model->Text|markdown}
    </p>
    <p>
        {submit value=Delete html_class='btn btn-danger'}
    </p>
{/form}