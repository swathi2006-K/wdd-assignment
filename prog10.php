<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>File Upload</title>
</head>
<body>
<h2>Upload a File</h2>
<form action="upload.php" method="post" enctype="multipart/form-data">
<input type="file" name="fileToUpload" id="fileToUpload" required><br><br>
<input type="submit" name="submit" value="Upload File">
</form>
</body></html>

Upload.php
<?php
$targetDir = "uploads";
if (!is_dir($targetDir)) {
mkdir($targetDir, 0777, true);
}
$targetFile = $targetDir . "/" . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
if (isset($_POST["submit"])) {
if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
if ($check !== false) {
echo "File is an image - " . $check["mime"] . ".<br>";
$uploadOk = 1;
} else {
echo "File is not an image.<br>";
$uploadOk = 0;
}
if (file_exists($targetFile)) {
echo "Sorry, file already exists.<br>";
$uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 500000) {
echo "Sorry, your file is too large (max 500KB).<br>";
$uploadOk = 0;
}
$allowedExtensions = array("jpg", "jpeg", "png", "gif");
$fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
if (!in_array($fileExtension, $allowedExtensions)) {
echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
$uploadOk = 0;
}
if ($uploadOk == 0) {
echo "Sorry, your file was not uploaded.<br>";
} else {
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been
uploaded.<br>";
} else {
echo "Sorry, there was an error uploading your file.<br>";
}
}

} else {
echo "No file was uploaded or an error occurred.<br>";
}
}
?>
