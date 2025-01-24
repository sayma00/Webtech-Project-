function editData(rowId) {
    document.getElementById(`edit_button${rowId}`).style.display = 'none';
    document.getElementById(`save_button${rowId}`).style.display = 'inline-block';

    let courseID = document.getElementById(`course_id_row${rowId}`);
    let courseName = document.getElementById(`course_name_row${rowId}`);

    courseID.innerHTML = `<input type="text" id="course_id_edit${rowId}" value="${courseID.innerHTML}">`;
    courseName.innerHTML = `<input type="text" id="course_name_edit${rowId}" value="${courseName.innerHTML}">`;
}

function saveData(rowId) {
    document.getElementById(`edit_button${rowId}`).style.display = 'inline-block';
    document.getElementById(`save_button${rowId}`).style.display = 'none';

    let courseID = document.getElementById(`course_id_edit${rowId}`).value;
    let courseName = document.getElementById(`course_name_edit${rowId}`).value;

    document.getElementById(`course_id_row${rowId}`).innerHTML = courseID;
    document.getElementById(`course_name_row${rowId}`).innerHTML = courseName;
}

function deleteData(rowId) {
    document.getElementById(`row${rowId}`).remove();
}

function addData() {
    let table = document.getElementById('table');
    let newCourseID = document.getElementById('new_course_id').value;
    let newCourseName = document.getElementById('new_course_name').value;

    if (newCourseID && newCourseName) {
        let rowCount = table.rows.length;
        let newRow = table.insertRow(rowCount - 1);
        newRow.id = `row${rowCount}`;

        newRow.innerHTML = `
            <td id="course_id_row${rowCount}">${newCourseID}</td>
            <td id="course_name_row${rowCount}">${newCourseName}</td>
            <td id="manage_row${rowCount}">
                <button id="edit_button${rowCount}" onclick="editData(${rowCount})">Edit</button>
                <button id="save_button${rowCount}" style="display:none;" onclick="saveData(${rowCount})">Save</button>
                <button id="delete_button${rowCount}" onclick="deleteData(${rowCount})">Delete</button>
            </td>
        `;

        document.getElementById('new_course_id').value = '';
        document.getElementById('new_course_name').value = '';
    } else {
        alert('Please fill in all fields.');
    }
}

