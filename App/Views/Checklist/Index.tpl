<div class="breadcrumb">
    <li class="active">Checklists</li>
</div>
<h2>Checklists</h2>
<ul>
    {foreach $model as $list}
        <li>{actlink text=$list->Title action=Details id=$list->ID}</li>
    {/foreach}
</ul>
<p>
    {actlink text='Create New List' action=Create html_class='btn btn-primary'}
</p>