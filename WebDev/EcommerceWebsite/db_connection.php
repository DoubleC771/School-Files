<?php 
    $conn = mysqli_connect("localhost", "root", "", "logintest");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    function get_image($path = ''):string 
    {
        if(file_exists($path))
        {
            return $path;
        }
    
        return './images/no-image.jpg';
    }
?>