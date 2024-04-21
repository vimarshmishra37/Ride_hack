<!DOCTYPE html>
<html lang="en">
<head>
    <title>Employee</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="body_container">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="card mt-4">
<div class="card-header">
<h3>TO SEARCH BY CITY </h3>
</div><br>
<div class="card-body">
<div class="row">
<div class="col-md-7">
<form action="" method="GET">
<div class="input-group mb-3">
<input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search By City">
<button type="submit" class="btn btn-primary">Search</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<?php
if(isset($_GET['search']))
{?>
    <div class="container">
    <header class="header_container">
    <h1 class="header_title"> Helpers </h1>
    <h3 class="header_desc">
                For your aid .............
    </h3>
    </header>
    <main class="main_container">
    <?php
    // Include the database configuration file
    include 'dbgconfig.php';
    $ci=$_GET['search'];
    session_start(); // Start the session
    $category = $_SESSION['category'];
    $max_wage = $_SESSION['max_wage'];
    $min_wage = $_SESSION['min_wage'];
    // Get images from the database
    $q=$db->query("SELECT w1.username,w1.fullname,w1.city FROM worker_data1 AS w1,worker_data2 AS w2,worker_data3 AS w3 WHERE w2.min_wage>=$min_wage AND w2.max_wage<=$max_wage AND w3.category='$category' AND w1.username=w2.username AND w1.username=w3.username AND w1.city='$ci'");
    // $rp=$q->fetch_assoc();
    if($q->num_rows > 0)
    {
        while($row = $q->fetch_assoc())
        {
            $us=$row["username"];
            $query = $db->query("SELECT * FROM images WHERE id='$us'");
            $r=$query->fetch_assoc();
            $imageURL = 'uploads/'.$r["file_name"];?>
            <!-- card 1 start -->
            <div class="card_container">
            <a href="1.php?value=<?php echo $us ?>" class="card_image_container">
            <img src="<?php echo $imageURL; ?>"
            alt="card 1 image"
            class="card_image"
            loading="lazy"
            />
            </a>
            <div class="card_title_container">
            <a href="#" class="card_title_anchor">
            <h2 class="card_title"><?php echo $row['fullname'] ?></h2>
            </a>
            <p class="card_desc">
            <?php echo $row["city"] ?>
            </p>
            </div>
            <div class="card_footer_container">
            <div class="author_container">
            <div class="author_avatar_container">
            <img 
                src="https://api.dicebear.com/7.x/notionists/svg?seed=John?size=64"
                loading="lazy"
                class="author_avatar"
                alt="avatar 1"
            />
            </div>
            <div class="author_info_container">
            <span class="author_name">
                VERIFIED
            </span>
            <span class="author_date">
            <?php echo $r['uploaded_on'];?>
            </span>
            </div>
            </div>
            <div >
            <button class="card_tag_container" value="echo $us" ><?php echo $us ;?></button>
            </div>
            </div>
            </div>
            <?php 
        }
    }
    else
    { ?>
        <p>No Worker(s) found...</p>
        <?php 
    } ?>   
        <!-- card 1 ends here -->
        </main>
        </div>
    <?php 
} 
else
{
    ?>

                             
    <div class="container">

    <header class="header_container">
    <h1 class="header_title"> Helpers </h1>
    <h3 class="header_desc">
    For your aid ...................
    </h3>
    </header>
    <main class="main_container">
    <?php
    // Include the database configuration file
    include 'dbgconfig.php';
    session_start(); // Start the session
    $category = $_SESSION['category'];
    $max_wage = $_SESSION['max_wage'];
    $min_wage = $_SESSION['min_wage'];
    // Get images from the database
    $q=$db->query("SELECT w1.username,w1.fullname,w1.city FROM worker_data1 AS w1,worker_data2 AS w2,worker_data3 AS w3 WHERE w2.min_wage>=$min_wage AND w2.max_wage<=$max_wage AND w3.category='$category' AND w1.username=w2.username AND w1.username=w3.username");
    // $rp=$q->fetch_assoc();
    if($q->num_rows > 0)
    {
        while($row = $q->fetch_assoc())
        {
            $us=$row["username"];
            $query = $db->query("SELECT * FROM images WHERE id='$us'");
            $r=$query->fetch_assoc();
            $imageURL = 'uploads/'.$r["file_name"];?>
            <!-- card 1 start -->
            <div class="card_container">
            <a href="1.php?value=<?php echo $us ?>" class="card_image_container">
            <img src="<?php echo $imageURL; ?>"
            alt="card 1 image"
            class="card_image"
            loading="lazy"
            />
            </a>

            <div class="card_title_container">
            <a href="#" class="card_title_anchor">
            <h2 class="card_title"><?php echo $row['fullname'] ?></h2>
            </a>
            <p class="card_desc">
            <?php echo $row["city"] ?>
            </p>
            </div>

            <div class="card_footer_container">

            <div class="author_container">
            <div class="author_avatar_container">
            <img 
            src="https://api.dicebear.com/7.x/notionists/svg?seed=John?size=64"
            loading="lazy"
            class="author_avatar"
            alt="avatar 1"
            />
            </div>
            <div class="author_info_container">
            <span class="author_name">
            VERIFIED
            </span>
            <span class="author_date">
            <?php echo $r['uploaded_on'];?>
            </span>
            </div>
            </div>

            <div >
            <button class="card_tag_container" value="echo $us" ><?php echo $us ;?></button>
            </div>
            </div>
            </div>
            <?php 
        }
    }
    else
    { ?>
        <p>No Worker(s) found...</p>
        <?php 
    } ?>
        </main>
    </div>
    <?php
}
?>
</body>
</html>