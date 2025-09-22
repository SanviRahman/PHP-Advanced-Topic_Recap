<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="upload-box">
        <h2>Upload Your Image</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload" required>
            <br>
            <input type="submit" value="Upload Image" name="submit">
        </form>
    </div>

    <div class="output-box">
        <?php
        if (isset($_POST["submit"])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is a actual image
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "<p>✅ File is an image: " . $check['mime'] . "</p>";
                $uploadOk = 1;
            } else {
                echo "<p>❌ File is not an image.</p>";
                $uploadOk = 0;
            }

            // Check if file exists
            if (file_exists($target_file)) {
                echo "<p>⚠️ File already exists.</p>";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "<p>❌ Sorry, your file is too large.</p>";
                $uploadOk = 0;
            }

            // Allow certain formats
            if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
                echo "<p>❌ Only JPG, JPEG, PNG & GIF files are allowed.</p>";
                $uploadOk = 0;
            }

            // Upload file
            if ($uploadOk == 1) {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "<p>✅ The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.</p>";
                } else {
                    echo "<p>❌ Sorry, there was an error uploading your file.</p>";
                }
            } else {
                echo "<p>❌ Your file was not uploaded.</p>";
            }
        }
        ?>
    </div>
</body>

</html>