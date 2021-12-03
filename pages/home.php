<?php session_start(); ?>

<?php require("../components/header.php"); ?>



<?php

require '../functions/subjects.php';

$subjects = getsubjects();

?>
<div class="container">
    <form method="POST" action="home.php">
        <div class="row offset-1 ">
            <div class="col-sm-4">
                <h4>Hello ! <?php echo $_SESSION["username"]; ?></h1>
                    <div class="form-group">
                        <label for="subjects">Select a subject</label>
                        <select name="subject" class="form-control">
                            <option value="">Select a subject</option>
                            <?php
                            foreach ($subjects as $subject) {
                                echo "<option value= " . $subject["id"] . ">" . $subject["subjectname"] . "</values>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">write a description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="assignment url">assignement url</label>
                        <input type="text" name="assignmenturl" class="form-control" />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-success" />
                    </div>

            </div>
            <div class="col-sm-4">

                <?php
                $userid = $_SESSION["userid"];
                $assignments = getAssignments($userid);
                ?>

                <header>My Assignments</header>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>subject</th>
                        <th>Description</th>
                        <th>Assignment</th>
                    </tr>
                    <?php
                    if (isset($assignments) && !empty($assignments)) {
                        foreach ($assignments as $assignment) {
                            echo "<tr>";
                            echo "<td>" . $assignment["subjectname"] . "</td>";
                            echo "<td>" . $assignment["notes"] . "</td>";
                            echo "<td><a href='" . $assignment["assignmenturl"] . "'>assignment</a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>

                </table>

            </div>
    </form>
</div>


<?php

if (isset($_POST["submit"])) {

    $description = $_POST["description"];
    $assignmenturl = $_POST["assignmenturl"];
    $subject = $_POST["subject"];


    $id = $_SESSION["userid"];

    $result = AddAssignment($description, $assignmenturl, $subject, $id);

    if ($result) {
        echo "Assignment added";
    } else {
        echo "Assignment not added, please try again";
    }
}




?>








<?php require("../components/footer.php"); ?>