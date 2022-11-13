<?php

function formCheck($data)
{
    if ($data != NULL) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } else {
        return NULL;
    }
}
