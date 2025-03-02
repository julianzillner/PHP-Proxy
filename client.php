<?php
$apiUrl = 'https://example.com/replacement/example';
$postData = [
    "placeholders" => [
        "example" => "Example Text",
    ]
];
$headers = [
    'Authorization: Bearer YOUR_API_KEY_HERE'
];
include 'inc/proxy.inc.php';
$response = callApi($apiUrl, $postData, $headers);
$example_text = $response['data'] ?? '';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php echo $example_text; ?>
</body>

</html>