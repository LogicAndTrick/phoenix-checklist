<h2>Register</h2>
{form}
    <p>
        {label for=name text='Username'}
        {field for=name}
    </p>
    <p>
        {label for=oid text='OpenID'}
        {field type=openid html_id=form_oid}
    </p>
    <p>
        {submit value='Continue'}
    </p>
{/form}