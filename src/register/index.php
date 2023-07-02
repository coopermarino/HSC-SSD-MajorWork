<?php
#session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
        function generateKeyPair() {
            if (!window.crypto || !window.crypto.subtle) {
                alert("Web Crypto API is not supported in this browser. Please use a modern browser.");
                return;
            }

            // Generate the key pair
            window.crypto.subtle.generateKey(
                {
                    name: "RSA-OAEP",
                    modulusLength: 2048,
                    publicExponent: new Uint8Array([0x01, 0x00, 0x01]),
                    hash: { name: "SHA-256" },
                },
                true,
                ["encrypt", "decrypt"]
            )
            .then(function(keyPair) {
                // Export the private key and store it in localStorage
                window.crypto.subtle.exportKey("jwk", keyPair.privateKey)
                .then(function(privateKeyJwk) {
                    localStorage.setItem("privateKey", JSON.stringify(privateKeyJwk));
                })
                .catch(function(error) {
                    console.error("Error exporting private key:", error);
                });

                // Export the public key and store it in a hidden input field
                window.crypto.subtle.exportKey("jwk", keyPair.publicKey)
                .then(function(publicKeyJwk) {
                    document.getElementById("publicKey").value = JSON.stringify(publicKeyJwk);
                })
                .catch(function(error) {
                    console.error("Error exporting public key:", error);
                });
            })
            .catch(function(error) {
                console.error("Error generating key pair:", error);
            });
        }
    </script>
</head>
<body>
    <div class="container">
        <form method="post" action="../code.php">
            <img src="https://via.placeholder.com/300x150" alt="Logo" class="logo">
            <input type="text" id="username" name="username" placeholder="Username:">
            <input type="password" id="password" name="password" placeholder="Password:">
            <input type="email" id="email" name="email" placeholder="Email:">
            <input type="hidden" id="publicKey" name="publicKey">
            <input type="submit" value="Register" name="register" onclick="generateKeyPair();">
            <span type="register"><p>Already have an account? <a href="../login" class="register-btn">Login</a></p></span>
        </form>
    </div>
</body>
</html>
