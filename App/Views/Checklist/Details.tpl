<div class="breadcrumb">
    <li>{actlink text=Checklists action=Index} <span class="divider">&gt;</span></li>
    <li class="active">{$model->Title}</li>
</div>
<h2>
    {$model->Title}
    {actlink text='<i class="icon-white icon-remove"></i>' action=Delete id=$model->ID html_class='btn btn-danger btn-mini pull-right'}
    {actlink text='<i class="icon-white icon-pencil"></i>' action=Edit id=$model->ID html_class='btn btn-primary btn-mini pull-right'}
</h2>
<ul class="checklist">
    {foreach $model->Find('ChecklistItem') as $item}
        <li>
            <div class="media">
                <div class="pull-left">
                    {if $item->IsChecked}
                        {actlink text='<i class="icon-white icon-ok"></i>' action=UncheckItem id=$item->ID html_class='btn btn-success'}
                    {else}
                        {actlink text='<i class="icon-white icon-remove"></i>' action=CheckItem id=$item->ID html_class='btn btn-danger'}
                    {/if}
                </div>
                <div class="pull-right">
                    {actlink text='<i class="icon-white icon-pencil"></i>' action=EditItem id=$item->ID html_class='btn btn-primary btn-mini'}
                    {actlink text='<i class="icon-white icon-remove"></i>' action=DeleteItem id=$item->ID html_class='btn btn-danger btn-mini'}
                    {actlink text='<i class="icon-white icon-chevron-up"></i>' action=UpItem id=$item->ID html_class='btn btn-info btn-mini'}
                    {actlink text='<i class="icon-white icon-chevron-down"></i>' action=DownItem id=$item->ID html_class='btn btn-info btn-mini'}
                </div>
                <div class="media-body">
                    {$item->Text|markdown}
                </div>
            </div>
        </li>
    {/foreach}
</ul>
<p>
    {actlink text='Add New Item' action=CreateItem id=$model->ID html_class='btn btn-primary'}
</p>