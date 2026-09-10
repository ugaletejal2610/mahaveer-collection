<?php
// ============================================================
// PROCESS ENQUIRY - Single file for both forms
// ============================================================

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$google_script_url = "https://script.google.com/macros/s/AKfycbyJTClEpac2Dl269AEnrYD2Ye6a-vhJPiWphmY46dxPotzYLn6wKOiGDpk77QXbBRzuBw/exec";

// ── Log incoming data ──────────────────────────────────────────
error_log("=== ENQUIRY RECEIVED ===");
error_log("POST: " . print_r($_POST, true));

// ── Collect fields ─────────────────────────────────────────────
$data = [
    'name'    => trim($_POST['name'] ?? ''),
    'phone'   => trim($_POST['phone'] ?? ''),
    'email'   => trim($_POST['email'] ?? ''),
    'message' => trim($_POST['message'] ?? ''),
];

if (isset($_POST['category']) && !empty($_POST['category'])) {
    $data['category'] = trim($_POST['category']);
}
if (isset($_POST['product']) && !empty($_POST['product'])) {
    $data['product'] = trim($_POST['product']);
}

// ── Determine source: use explicit POST value if available ────
$data['source'] = trim($_POST['source'] ?? '');
if (empty($data['source'])) {
    // Fallback detection (only if not sent)
    $data['source'] = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        ? 'modal' : 'contact_page';
}

// Log the final source
error_log("Source determined: " . $data['source']);

// ── Validation ──────────────────────────────────────────────────
$errors = [];
if (empty($data['name'])) {
    $errors[] = "Name is required.";
}
if (empty($data['email'])) {
    $errors[] = "Email is required.";
} elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Please enter a valid email address.";
}
if (empty($data['message'])) {
    $errors[] = "Message is required.";
}

if (!empty($errors)) {
    $error_message = implode(" ", $errors);
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => $error_message]);
    exit;
}

// ── Send to Google Script ──────────────────────────────────────
$ch = curl_init($google_script_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curl_error = curl_error($ch);
curl_close($ch);

// ── Log detailed response ──────────────────────────────────────
error_log("HTTP Code: " . $http_code);
error_log("Raw Response: " . $response);
if ($curl_error) error_log("CURL Error: " . $curl_error);

// ── Parse response ──────────────────────────────────────────────
$result = json_decode($response, true);

// If response is not valid JSON but HTTP 200, treat as success
if ($result === null && $http_code === 200) {
    error_log("Response not JSON but HTTP 200 – treating as success.");
    $result = ['success' => true, 'message' => 'Enquiry sent successfully.'];
} elseif ($result === null) {
    error_log("Invalid JSON response (HTTP $http_code): " . $response);
    $result = ['success' => false, 'message' => "Server error (HTTP $http_code). Please try again later."];
}

// ── Handle success/failure ─────────────────────────────────────
if ($http_code === 200 && isset($result['success']) && $result['success'] == true) {
    $response_data = ['success' => true, 'message' => $result['message'] ?? 'Enquiry sent successfully.'];
} else {
    $error_msg = $result['message'] ?? 'Something went wrong. Please try again.';
    $response_data = ['success' => false, 'message' => $error_msg];
}

// Always return JSON
header('Content-Type: application/json');
echo json_encode($response_data);
exit;
?>