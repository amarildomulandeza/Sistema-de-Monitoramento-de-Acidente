<?php
// Include database connection
require '../connect.php'; // Adjust the path as needed

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Read raw JSON input
    $input = file_get_contents("php://input");
    $data = json_decode($input, true);

    // Validate if JSON decoding was successful
    if (json_last_error() !== JSON_ERROR_NONE) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid JSON input']);
        exit;
    }

    // Extract data from the JSON payload
    $requiredFields = [
        'emergency_id', 'agency_id', 'agency_name', 'case_severity', 
        'emergency_category', 'dates', 'state', 'phone_number', 
        'name', 'email', 'victim_id'
    ];
    $missingFields = [];

    foreach ($requiredFields as $field) {
        if (empty($data[$field])) {
            $missingFields[] = $field;
        }
    }

    // If any required fields are missing, return an error
    if (!empty($missingFields)) {
        http_response_code(400);
        echo json_encode(['error' => 'All required fields must be filled.', 'missing_fields' => $missingFields]);
        exit;
    }

    // Assign values
    $emergency_id = $data['emergency_id'];
    $agency_id = $data['agency_id'];
    $agency_name = $data['agency_name'];
    $case_severity = $data['case_severity'];
    $emergency_category = $data['emergency_category'];
    $dates = $data['dates'];
    $state = $data['state'];
    $phone_number = $data['phone_number'];
    $address = $data['address'] ?? null;
    $name = $data['name'];
    $status = $data['status'] ?? 'Pendente';
    $email = $data['email'];
    $victim_id = $data['victim_id'];
    $description = $data['description'] ?? null;
    $photo = $data['photo'] ?? null;

    try {
        // Prepare the SQL query
        $stmt = $db->prepare("
            INSERT INTO emergency (
                emergency_id, agency_id, agency_name, case_severity, 
                emergency_category, dates, state, phone_number, 
                address, name, status, email, victim_id, description, photo
            ) VALUES (
                :emergency_id, :agency_id, :agency_name, :case_severity, 
                :emergency_category, :dates, :state, :phone_number, 
                :address, :name, :status, :email, :victim_id, :description, :photo
            )
        ");

        // Bind parameters
        $stmt->bindParam(':emergency_id', $emergency_id);
        $stmt->bindParam(':agency_id', $agency_id);
        $stmt->bindParam(':agency_name', $agency_name);
        $stmt->bindParam(':case_severity', $case_severity);
        $stmt->bindParam(':emergency_category', $emergency_category);
        $stmt->bindParam(':dates', $dates);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':victim_id', $victim_id);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':photo', $photo);

        // Execute the query
        $stmt->execute();

        // Respond with the submitted data
        http_response_code(200);
        echo json_encode([
            'success' => 'Emergency reported successfully.',
            'submitted_data' => $data
        ]);
    } catch (PDOException $e) {
        // Handle database errors
        http_response_code(500);
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    // Reject non-POST requests
    http_response_code(405);
    echo json_encode(['error' => 'Invalid request method.']);
}
