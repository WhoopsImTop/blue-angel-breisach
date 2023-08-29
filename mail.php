<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $to = "eliasenglen2@gmail.com";
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $headers = "From: info@blue-angel.de\r\n";
    $headers .= "Reply-To: info@blue-angel.de\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"\r\n";

    $attachments = [];

    foreach ($_FILES["images"]["tmp_name"] as $index => $tmp_name) {
        $filename = $_FILES["images"]["name"][$index];
        $filepath = $tmp_name;
        $attachments[] = ["filename" => $filename, "filepath" => $filepath];
    }

    $content = "--boundary\r\n";
    $content .= "Content-Type: text/plain; charset=\"utf-8\"\r\n";
    $content .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $content .= $message . "\r\n";

    foreach ($attachments as $attachment) {
        $file_data = file_get_contents($attachment["filepath"]);

        $content .= "--boundary\r\n";
        $content .= "Content-Type: application/octet-stream; name=\"" . $attachment["filename"] . "\"\r\n";
        $content .= "Content-Disposition: attachment; filename=\"" . $attachment["filename"] . "\"\r\n";
        $content .= "Content-Transfer-Encoding: base64\r\n\r\n";
        $content .= chunk_split(base64_encode($file_data)) . "\r\n";
    }

    $content .= "--boundary--";

    $success = mail($to, $subject, $content, $headers);

    if ($success) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }
}
