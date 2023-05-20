<?php

require_once "../model/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $searchText = $_POST["search"];
    
    
    $contacts = searchContacts($searchText);
    
    if (!empty($contacts)) {
        echo "<h2>Search Results:</h2>";
        echo "<table>";
        echo "<tr><th>Name</th><th>Email</th><th>Subject</th><th>Message</th></tr>";
        
        foreach ($contacts as $contact) {
            echo "<tr>";
            echo "<td>" . $contact['NAME'] . "</td>";
            echo "<td>" . $contact['EMAIL'] . "</td>";
            echo "<td>" . $contact['SUBJECT'] . "</td>";
            echo "<td>" . $contact['MESSAGE'] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "<p>No results found.</p>";
    }
}

function searchContacts($searchText)
{
    $con = getConnection();
    $stmt = oci_parse($con, 'SELECT * FROM contact WHERE name LIKE :searchText OR email LIKE :searchText OR subject LIKE :searchText OR message LIKE :searchText');
    
    // Bind the parameter
    $searchPattern = '%' . $searchText . '%';
    oci_bind_by_name($stmt, ':searchText', $searchPattern);
    
    // Execute the statement
    oci_execute($stmt);
    
    // Fetch the result rows
    $contacts = array();
    while ($row = oci_fetch_assoc($stmt)) {
        $contacts[] = $row;
    }
    
    // Close the statement
    oci_free_statement($stmt);
    
    return $contacts;
}
?>
