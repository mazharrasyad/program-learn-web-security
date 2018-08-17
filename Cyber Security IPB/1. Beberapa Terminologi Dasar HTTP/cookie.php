<?php

if (!isset($_COOKIE['user']))
  setcookie("user", "abrari");
else
  echo "Welcome, ".$_COOKIE['user'];
