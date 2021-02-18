<?php

$db = mysqli_connect("localhost","root","","arada");

if (!$db) {
  die("Connection failed DB: " . mysqli_connect_error());
} 