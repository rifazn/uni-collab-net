<?php

require_once('../lib/common.php');
$pdo = getPDO();
session_start();

// get the user info, null if not logged in
$user = getAuthUser();

// redirect user to login if not logged in
if (!$user)
    redirectAndExit('user.php');

$courses = getCourses($pdo, $user);

if($_POST)
{

        $errors = array();

        $extension = array("jpeg","jpg","png","gif");


        if(isset($_FILES["files"])==false)
        {
            echo "<b>Please, Select the files to upload!!!</b>";
            return;
        }

        // gets inserted in the 'resources' table
        $sql= "INSERT INTO resources SET by_user=:user";

        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute( array('user' => $user, ) );

        echo $user . 'And result is: ' . $result . "\n";

        $lastId = $pdo->lastInsertId();

        foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name)
        {
            $uploadThisFile = true;

            $file_name=$_FILES["files"]["name"][$key];
            $file_tmp=$_FILES["files"]["tmp_name"][$key];

            $ext=pathinfo($file_name,PATHINFO_EXTENSION);

            if(!in_array(strtolower($ext),$extension))
            {
                array_push($errors, "File type is invalid. Name:- ".$file_name);
                $uploadThisFile = false;
            }

            /*if($_FILES["files"]["size"][$key] > $totalBytes){
                array_push($errors, "File size must be less than 100KB. Name:- ".$file_name);
                $uploadThisFile = false;
            }*/

            if(file_exists("Upload/".$_FILES["files"]["name"][$key]))
            {
                array_push($errors, "File already exist. Name:- ". $file_name);
                $uploadThisFile = false;
            }

            if($uploadThisFile){
                $filename=basename($file_name,$ext);
                $newFileName=$filename.$ext;
                move_uploaded_file($_FILES["files"]["tmp_name"][$key],"images/".$newFileName);


                // now we insert into the 'resources_for' table
                $sql = "INSERT INTO resources_for SET r_id = :id, takes_id = :course_id, photo = :photoAddress";
                $stmt = $pdo->prepare($sql);
                $result = $stmt->execute( array('photoAddress' => "images/".$newFileName, 'id' => $lastId, 'course_id' => $_POST['course_id'], ) );

                echo $lastId;
                
            }

        }


        echo "Course id is: " . $_POST['course_id'] . "<br>";

        $count = count($errors);

        if($count != 0){
            foreach($errors as $error){
                echo $error."<br/>";
            }
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Uni Collab Net</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php include('../templates/html-head.html.php') ?>
    </head>
    <body>
        <div id="content">
            <header id="main-header">
                <?php require('../templates/header.html.php'); ?>
            </header>

            <nav class="contents-nav">
                <?php require('../templates/nav.html.php') ?>
            </nav>

            <main class="main-content">

                <form method="POST" enctype="multipart/form-data">
                    <label for="course_id"> Course:
                    <select name="course_id" id="course_id">
                        <?php foreach ($courses as $course): ?>
                            <option value="<?=$course['course_id'] ?>"><?=$course['course_code'] , ' ' , $course['course_title'] ?></option>
                        <?php endforeach ?>
                    </select>
                    </label>

                    <label for="exampleInputFile">Select files to upload:</label>
                            <input type="file" id="exampleInputFile" name="files[]" multiple="multiple">

                    <button type="submit" name="btnSubmit" >Start Upload</button>

                </form>
            </main>

            <aside class="sidebar">
                <?php require('../templates/aside.html.php') ?>
            </aside>

            <footer>
                <?php require('../templates/footer.html.php'); ?>
            </footer>
        </div>

        <!-- <script src="upload.js"></script> -->
    </body>
</html>
