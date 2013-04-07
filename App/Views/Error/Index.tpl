<h2>Login</h2>
{form}
    <p>
        {label for=oid text='OpenID'}
        {field type=openid html_id=form_oid}
    </p>
    <p>
        {submit value='Log In' html_class='btn btn-primary'}
    </p>
{/form}