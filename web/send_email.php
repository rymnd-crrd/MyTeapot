<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $message = $_POST['Message'];

    // Change these values to your email and name
    $to = "angeloatienza167@gmail.com";
    $subject = "Message from $name";
    $body = "Name: $name\nEmail: $email\n\n$message";

    // Send email
    if (mail($to, $subject, $body)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message. Please try again later.";
    }
}
?>

<script>
document.getElementById('emailForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting normally

    var form = this;
    var formData = new FormData(form);

    fetch(form.action, {
        method: form.method,
        body: formData
    })
    .then(function(response) {
        return response.text();
    })
    .then(function(text) {
        document.getElementById('msg').innerText = text;
        form.reset(); // Reset the form after successful submission
    })
    .catch(function(error) {
        console.error('Error:', error);
    });
});
</script>
