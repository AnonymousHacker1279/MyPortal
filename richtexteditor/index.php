<?php

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


?>

<!DOCTYPE html>
<!--
Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
-->
<!--Powered by CKEditor-->
<html>
<head>
    <meta charset="utf-8">
    <title>Rich Text Editor</title>
    <script src="ckeditor/ckeditor.js"></script>
    <script src="ckeditor/samples/js/sample.js"></script>
    <link rel="stylesheet" href="ckeditor/samples/css/samples.css">
    <link rel="stylesheet" href="ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.js"></script>
</head>
<body id="main">
    <main>
        <div class="adjoined-bottom">
            <div class="grid-container">
                <div class="grid-width-100">
                    <div>
                        <form id="content" name="content" action="save.php" method="post">
                            <input type="submit" id="submit" name="submit" style="display:none" />
                            <textarea id="editor" class="ckeditor" name="content"></textarea>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
	initSample();
    </script>
</body>
</html>
