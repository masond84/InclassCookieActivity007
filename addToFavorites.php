<?php
session_start();

// Check if all required query parameters are present
if (isset($_GET['PaintingID'], $_GET['ImageFileName'], $_GET['Title'])) {
    // Retrieve favorites list from session (or initialize if not set)
    $favorites = isset($_SESSION['favorites']) ? $_SESSION['favorites'] : [];

    // Create an array for the new favorite painting
    $newFavorite = [
        'PaintingID' => $_GET['PaintingID'],
        'ImageFileName' => $_GET['ImageFileName'],
        'Title' => urldecode($_GET['Title']),
    ];

    // Add the new favorite to the list
    $favorites[] = $newFavorite;

    // Store the updated list in the session
    $_SESSION['favorites'] = $favorites;

    // Redirect back to browse or another page
    header('Location: view-favorites.php');
    exit();
} else {
    // Redirect if parameters are missing
    header('Location: browse-paintings.php');
    exit();
}