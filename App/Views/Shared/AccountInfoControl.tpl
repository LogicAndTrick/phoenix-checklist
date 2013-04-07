<div>
    {if Authentication::IsLoggedIn()}
        {form}
        <p>
            You are logged in as <strong>{Authentication::GetUserName()}</strong>.
            {field for=logout type=hidden value=true}
            {submit html_class='btn' value='Log out'}
        </p>
        {/form}
    {/if}
</div>