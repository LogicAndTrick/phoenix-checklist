<h2>Register</h2>
{form}
    {validationsummary}
    <p>
        {hidden for=register value=openid}
        {label for=username text='Username'}
        {field for=username}
    </p>
    <p>
        {label for=email text='Email'}
        {field for=email}
    </p>
    <p>
        {label for=oid text='OpenID'}
        {field type=openid html_id=form_oid}
    </p>
    <p>
        {submit value='Continue' html_class='btn btn-primary'}
    </p>
{/form}