<?php

use App\Models\UserModel;

function getKaryawanByIdUser($id)
{
    $modelUser = new UserModel();
    return $modelUser->getKaryawanByIdUser($id);
}
