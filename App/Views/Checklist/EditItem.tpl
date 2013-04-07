<div class="breadcrumb">
    <li>{actlink text=Checklists action=Index} <span class="divider">&gt;</span></li>
    <li>{actlink text=$list->Title action=Details id=$list->ID} <span class="divider">&gt;</span></li>
    <li class="active">Edit Item</li>
</div>
<h2>Edit Item</h2>
{form}
    <p>
        {label for=Text}
        {validation for=Text}
        {textarea for=Text model=$model html_class='input-block-level'}
    </p>
    <p>
        {submit value=Submit html_class='btn btn-primary'}
    </p>
{/form}