<?php
session_start();



$conn = new mysqli($servername, $username, $password, $database);


$menuItems = [
    'home' => ['file' => 'home.php', 'label' => 'home'],
    'login' => ['file' => 'login.php', 'label' => 'Log In'],
    'register' => ['file' => 'register.php', 'label' => 'Register'],
    'logout' => ['file' => 'logout.php', 'label' => 'Log Out'],
    'add_book' => ['file' => 'add_book.php', 'label' => 'Add Book'],
    'book_list' => ['file' => 'book_list.php', 'label' => 'Book List'],
    'gallery' => ['file' => 'gallery.php', 'label' => 'Image Gallery'],
    'upload_image' => ['file' => 'upload_image.php', 'label' => 'Upload Image'],
    'contact' => ['file' => 'contact.php', 'label' => 'Contact'],
    'view_message' => ['file' => 'view_message.php', 'label' => 'View Messages']
];
?>
