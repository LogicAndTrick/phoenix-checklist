<div class="breadcrumb">
    <li>{actlink text=Checklists action=Index} <span class="divider">&gt;</span></li>
    <li>{actlink text=$model->Title action=Details id=$model->ID} <span class="divider">&gt;</span></li>
    <li class="active">Delete</li>
</div>
<h2>Delete Checklist: {$model->Title}</h2>
{form}
    <p>
        Are you sure you want to delete this checklist?
    </p>
    <p>
        {submit value='Delete List' html_class='btn btn-danger'}
    </p>
{/form}