<?php

function is_email($email)
{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        return false;
    }
    return true;
}

function set_value($label)
{
    global $$label;
    /* phải 2 dấu $$ thì mới thành biến được VD 'fullname' vào đây sẽ là $fullname */
    if(!empty($$label)) 
    return $$label;
}

function set_value_select($label,$value)
{
    global $$label;
    /* phải 2 dấu $$ thì mới thành biến được VD 'fullname' vào đây sẽ là $fullname */
    if(!empty($$label) && $$label == $value) 
    return "selected = 'selected'";
}

function form_error($label)
{
    global $error;
    if(!empty($error[$label]))
    return "<div style='color:red;font-style: italic;'>$error[$label]</div>";
}

function alert_success()
{
    global $alert, $error;
    if(empty($error))
    {
        return "<div style='color:red;font-style: italic;'>$alert</div>";
    }
}

