<?php
session_start();

// Check if we are removing all favorites
if (isset($_GET['clear']) && $_GET['clear'] === 'true') {
    // Clear the favorites list
    unset($_SESSION['favorites']);
} elseif (isset($_GET['PaintingID'])) {
    // Remove a specific painting
    $paintingID = $_GET['PaintingID'];
    if (isset($_SESSION['favorites'])) {
        // Filter out the painting with the specified PaintingID
        $_SESSION['favorites'] = array_filter($_SESSION['favorites'], function ($favorite) use ($paintingID) {
            return $favorite['PaintingID'] != $paintingID;
        });
    }
}

// Redirect back to the favorites page
header('Location: view-favorites.php');
exit();
