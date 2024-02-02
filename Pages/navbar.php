<?php
include '../templates/header.php';
session_start();
require('../koneksi.php');
?>

<nav class="bg-navbar w-full text-white p-4 flex justify-between items-center">
    <h1 class="font-bold text-xl">E-Stock</h1>
    <div>
        <ul class="flex gap-6">
            <li><a href="../index.php" class="hover:text-slate-300">Home</a></li>
            <li><a href="" class="hover:text-slate-300">Admin Pages</a></li>
            <li><a href="../about.php" class="hover:text-slate-300">About</a></li>
        </ul>
    </div>
    <div>
        <?php if ($_SESSION == null) : ?>
            <a href="../auth/login.php">Login</a>
        <?php else : ?>
            <a href="../auth/logout.php">Logout</a>
        <?php endif ?>
    </div>
</nav>