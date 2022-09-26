<?php

if (!isset($_SESSION['customer'])) {
    header('Location: /login?redirect=checkout');
}
