<?
header("X-Powered-By: Castfire");

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	// Incorrect method
	header("HTTP/1.1 418 I'm a teapot");
	header("Allow: POST");
	header("X-Reason: Bad method");
	exit;
}

if ($_SERVER['CONTENT_TYPE'] != 'application/job') {
	// Incorrect MIME type
	header("HTTP/1.1 418 I'm a teapot");
	header("X-Reason: Bad MIME type");
	exit;
}

$data	= json_decode(file_get_contents("php://input"), true);

if ($data === NULL) {
	// Not Valid JSON
	header("HTTP/1.1 418 I'm a teapot");
	header("X-Reason: Bad JSON");
	exit;
}

if (isset($data['name']) && isset($data['email']) && isset($data['intro']) && isset($data['links'])) {
	// Success
	$name	= $data['name'];
	$mail	= $data['email'];
	$intro	= $data['intro'];
	$links	= $data['links'];
	
	// Enter in jobs database here
	
	header("HTTP/1.1 202 Accepted");
	header("Thank-You: We'll be in touch!");
	exit;
} else {
	// Missing field
	header("HTTP/1.1 418 I'm a teapot");
	header("X-Reason: Missing Field");
	exit;
}

?>