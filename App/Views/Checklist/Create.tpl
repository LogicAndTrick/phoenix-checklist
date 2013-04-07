<div class="breadcrumb">
    <li>{actlink text=Checklists action=Index} <span class="divider">&gt;</span></li>
    <li class="active">Create</li>
</div>
<h2>Create Checklist</h2>
{form}
    <p>
        {label for=Title}
        {field for=Title}
        {validation for=Title}
    </p>
    <p>
        {label for=Items text='Quick-add items (separate by new lines)'}
        {textarea for=Items html_class='input-block-level'}
        {validation for=Items}
    </p>
    <p>
        {submit value='Create List' html_class='btn btn-primary'}
    </p>
{/form}