<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Regular Expressions</title>
</head>
<body>
<h2>Regular Expression</h2>
<form method="post" action="">
<label for="input_text">Enter Text:</label>
<input type="text" name="input_text" id="input_text" required>
<button type="submit">Submit</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["input_text"])) {
$userInput = $_POST["input_text"];
$pattern = '/^[a-zA-Z0-9]+$/';
echo "<h3>Applied Regular Expressions:</h3>";
if (preg_match($pattern, $userInput)) {
echo "<p>Input contains only letters and numbers.</p>";
} else {
echo "<p>Input contains characters other than letters and numbers.</p>";
}
preg_match_all('/[a-zA-Z]/', $userInput, $matches);
echo "<p>Letters found: " . implode(", ", $matches[0]) . "</p>";
$modifiedText = preg_replace('/\s+/', '_', $userInput);
echo "<p>Spaces replaced with underscores: $modifiedText</p>";
$splitText = preg_split('//u', $userInput, -1, PREG_SPLIT_NO_EMPTY);

echo "<p>Split into characters: " . implode(", ", $splitText) . "</p>";
}
?>
</body>
</html>
