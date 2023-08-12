<?php

// Function to perform form validation and return an array of error messages
function validateForm($formData) {
    $errors = array();

    // Add your validation logic here
    // Example:
    if (empty($formData['project_name'])) {
        $errors[] = "Project name is required.";
    }

    // Add more validation rules as needed

    return $errors;
}

// Function to establish a database connection and return the connection object
function connectDatabase() {
    $host = "lopcalhost";
    $username = "root";
    $password = "";
    $database = "7_notes";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Function to insert project details into the database
function insertProject($conn, $projectData) {
    $sql = "INSERT INTO projects (project_name, project_description) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $projectData['project_name'], $projectData['project_description']);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Function to retrieve project data from the database
function getProjects($conn) {
    $sql = "SELECT * FROM projects";
    $result = $conn->query($sql);
    
    $projects = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $projects[] = $row;
        }
    }

    return $projects;
}

// Function to update project information in the database
function updateProject($conn, $projectID, $projectData) {
    $sql = "UPDATE projects SET project_name = ?, project_description = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $projectData['project_name'], $projectData['project_description'], $projectID);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Function to delete projects from the database
function deleteProject($conn, $projectID) {
    $sql = "DELETE FROM projects WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $projectID);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}


?>
