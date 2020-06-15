<?php

session_start();
session_unset();
session_destroy();

echo "Deslogado com sucesso";
header("Location: ./index.html");
