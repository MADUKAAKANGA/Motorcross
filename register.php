<?php
require "configs/DbConn.php"; // Ensure this file connects to the database using PDO

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $vehicle_type = isset($_POST['vehicle_type']) ? $_POST['vehicle_type'] : '';

    try {
        // Get the next ticket number
        $stmt = $pdo->query("SELECT MAX(ticket_number) AS max_ticket_number FROM tickets");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $next_ticket_number = $result['max_ticket_number'] ? $result['max_ticket_number'] + 1 : 1063;

        // Insert registration details into the tickets table
        $sql = "INSERT INTO tickets (ticket_number, name, email, role, vehicle_type) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$next_ticket_number, $name, $email, $role, $vehicle_type]);

        // Generate a ticket
        $ticket_id = $pdo->lastInsertId(); // Assuming 'id' is the primary key
        $ticket = generateTicket($next_ticket_number, $name, $role);

        echo "Registration successful! Here is your ticket:<br>";
        echo $ticket;
        echo '<button onclick="printTicket()">Print Ticket</button>';
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Function to generate a printable ticket
function generateTicket($ticket_number, $name, $role) {
    return "
    <div id='ticket' style='border: 1px solid #000; padding: 20px; max-width: 300px;'>
        <h2>Event Ticket</h2>
        <p><strong>Ticket Number:</strong> $ticket_number</p>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Role:</strong> $role</p>
        <p>Thank you for registering!</p>
    </div>";
}
?>

<script>
    function printTicket() {
        var ticket = document.getElementById('ticket').innerHTML;
        var printWindow = window.open('', '', 'height=600,width=800');
        printWindow.document.write('<html><head><title>Print Ticket</title>');
        printWindow.document.write('</head><body >');
        printWindow.document.write(ticket);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
    }
</script>
