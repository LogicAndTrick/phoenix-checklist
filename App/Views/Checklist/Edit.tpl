<div class="breadcrumb">
    <li>{actlink text=Checklists action=Index} <span class="divider">&gt;</span></li>
    <li>{actlink text=$model->Title action=Details id=$model->ID} <span class="divider">&gt;</span></li>
    <li class="active">Edit</li>
</div>
<h2>Edit Checklist: {$model->Title}</h2>
{form}
    <p>
        {label for=Title}
        {field for=Title model=$model}
        {validation for=Title}
    </p>
    <p>
        {submit value='Edit List' html_class='btn btn-primary'}
    </p>
{/form}