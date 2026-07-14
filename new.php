<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "blogdb";

$conn = new mysqli($hostname, $username, $password, $dbname);

// if($conn->connect_error){
//     echo "Failed to connect";
// }

// GET = $_GET
// POST = $_POST

if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $body = $_POST["body"];


    $stmt = "INSERT INTO article(title,body) VALUE('$title', '$body')";

    $insert = $conn->query($stmt);

    // error / id

    if ($insert) {
        echo "Data inserted successfully";
    } else {
        echo "Failed to save the data";
    }
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cool Blog</title>

    <link rel="stylesheet" href="./assets/css/style.css" />
</head>

<body>
    <?php include './components/header.php';  ?>
    <main>
        <!-- This is our main content area. This is where the content of each page will go. For example, on the home page, we might have a list of recent blog posts. On the about page, we might have some information about the author. On the contact page, we might have a contact form. -->

        <div class="form-wrapper">
            <form action="" method="POST">
                <h1>Add new Article</h1>
                <input class="text-field" name="title" type="text" placeholder="Enter title" required />
                <textarea class="body-field" name="body" rows="7" placeholder="Enter Body of the article" required></textarea>
                <button class="btn" name="submit" type="submit">Send</button>
            </form>
        </div>
    </main>


    <footer>
        <!-- This is our footer, it will be the same on all pages. It will contain some copyright information and maybe some links to social media. -->
    </footer>

</body>

</html>