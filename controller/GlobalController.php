<?php

final class GlobalController
{
    public function redirect($path)
    {
        header("Location:  $path");
    }
}
