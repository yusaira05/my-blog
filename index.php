<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "blogdb";

$conn = new mysqli($hostname, $username, $password, $dbname);

$sql = "SELECT * FROM article WHERE status = 1 ORDER BY created_at DESC";
$result = $conn->query($sql);

// SQL INJECTION 
?>
<!-- 
1->TRUE
0-> false 

title == of

'
0,1,2.....n != "" ''
a,c,d.... n = "" ''
anc, abc, yas, lope = "" ''

-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cool Blog</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="/assets/css/style.css" /> -->
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="./assets/img/logo.png" alt="Bootstrap" height="30">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./update.php">Update</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./new.php">Add</a>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <main class="container">
        <h1> new heading </h1>

        <!-- This is our main content area. This is where the content of each page will go. For example, on the home page, we might have a list of recent blog posts. On the about page, we might have some information about the author. On the contact page, we might have a contact form. -->
        <h1>Articles</h1>
        <h3>Total found: <?php echo $result->num_rows;  ?></h3>

        <div class="row">

            <?php
            while ($row = $result->fetch_assoc()) {
                $onErrorSrc = "this.src='./assets/img/fallback.jpg'";
                echo '
                <div class="col my-2">
                    <div class="card" style="height:400px">  
                    
                        <img src="./assets/img/batman.jpg" onerror="' . $onErrorSrc . '" class="card-img-top" alt="Card image">
                    
                        <div class="card-body">
                            <h5 class="card-title">' . $row["title"] . '</h5>
                            <p class="card-text">' . substr($row["body"], 0, 66) . '...</p>
                            <a href="#" class="btn btn-primary">Read more</a>
                            <a href="./update.php?id='.$row["id"].'" class="card-link">Update</a>
                        </div>
                    </div>
            </div>';
            }

            //  
            ?>
        </div>
    </main>


    <footer>
        <!-- This is our footer, it will be the same on all pages. It will contain some copyright information and maybe some links to social media. -->
    </footer>

</body>

</html>