<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function checkAccess($access_group, $role) {
    if(in_array($role, $access_group)) {
        return true;
    } else {
        return false;
    }
}
