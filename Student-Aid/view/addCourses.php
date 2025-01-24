<?php
  session_start();
  include('../Controller/header.php');
  include('../Controller/authentication.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Course</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        .course-list {
            border: 1px solid black;
            margin: 0 100px;
            padding: 15px 130px 40px 130px;
        }

        .course-list #add_course {
            border: 1px solid black;
            background-color: rgba(58, 175, 169, 0.5);
            padding: 5px;
            margin: 10px 0;
            cursor: pointer;
        }

        .course-list table {
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
            margin-top: 10px;
        }

        input[type="text"] {
            background-color: rgba(58, 175, 169, 0.5);
            font-size: 14px;
            padding: 2px;
            width: 100%;
            max-width: 225px;
            border: 1px solid black;
        }

        .course-list th {
            background-color: #2b7a78;
            color: #def2f1;
        }

        .course-list th, .course-list td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }

        .course-list table button {
            background-color: rgba(58, 175, 169, 0.5);
            padding: 5px;
            border: 1px solid black;
            margin: 2px auto;
            display: block;
            cursor: pointer;
        }

        .course-list table td:last-child {
            text-align: center;
        }

        .table_responsive {
            max-height: 300px;
            overflow-y: auto;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="course-list">
    <p>Courses</p>
    <div class="table_responsive">
        <table id="table">
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Manage</th>
            </tr>
            <tr id="row1">
                <td id="course_id_row1">CS101</td>
                <td id="course_name_row1">Introduction to Programming</td>
                <td id="manage_row1">
                    <button id="edit_button1" onclick="editData(1)">Edit</button>
                    <button id="save_button1" onclick="saveData(1)">Save</button>
                    <button id="delete_button1" onclick="deleteData(1)">Delete</button>
                </td>
            </tr>
            <tr id="new_row">
                <td><input type="text" id="new_course_id" placeholder="Course ID"></td>
                <td><input type="text" id="new_course_name" placeholder="Course Name"></td>
                <td><button class="add" onclick="addData()">Add Course</button></td>
            </tr>
        </table>
    </div>
</div>
<script src="../view/JavaScript/Store.js"></script>
</body>
</html>
