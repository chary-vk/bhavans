<?php




function getsubjects()
{

    require 'db.php';

    $sql = "SELECT * FROM subjects";
    $result = mysqli_query($conn, $sql);
    $subjects = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $subjects;
}


function AddAssignment($desc, $assignmenturl, $subjectid, $userid)
{
    require 'db.php';

    $sql = "INSERT INTO assignments(notes,assignmenturl,subjectid,studentid) VALUES ('$desc','$assignmenturl','$subjectid','$userid')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

function getAssignments($userid)
{
    require 'db.php';

    $sql = "SELECT * FROM assignments join subjects on assignments.subjectid = subjects.id WHERE studentid = $userid";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $assignments = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $assignments;
    } else {
        return false;
    }
}
