<?php

include '/path/to/Phoenix.php';

/* REQUIRED SETTINGS */

Router::$default_controller = 'Checklist';
Router::$default_action = 'Index';
Templating::$master_page = 'Shared/Master';
Phoenix::$app_dir = '/path/to/App';
Phoenix::$base_url = '/';
Phoenix::$debug = false;
Phoenix::$debug_user = null;

/* DATABASE SETTINGS */

Database::$type = 'mysql';
Database::$host = 'database.host';
Database::$database = 'database.name';
Database::$username = 'database.username';
Database::$password = 'database.password';
Database::Enable();

/* AUTHENTICATION SETTINGS */

Authentication::$session_id = 'phoenix_login';
Authentication::$autologin = true;
Authentication::$useopenid = true;
Authentication::$openid_host = 'your.domain.com';

Authentication::$model = 'User';
Authentication::$field_id = 'ID';
Authentication::$field_username = 'Name';
Authentication::$field_password = 'Password';
Authentication::$field_cookie = 'Cookie';
Authentication::$field_openid = 'OpenID';

Authentication::$cookie_id = 'phoenix_username';
Authentication::$cookie_code = 'phoenix_code';
Authentication::$cookie_timeout = 30000000;

Authentication::$post_username = 'username';
Authentication::$post_password = 'password';
Authentication::$post_remember = 'remember';
Authentication::$post_logout = 'logout';
Authentication::$post_openid = 'openid';

Authentication::RegisterPasswordHasher(new AlgorithmHasher('sha256', 'prepend', 'append'));

Authentication::Enable();

/* AUTHORISATION SETTINGS */

Authorisation::SetAuthorisationMethod(new LoggedInAuthorisation()); // No advanced auth, just need to be logged in.

/* RUN */

Phoenix::Run();

?>
