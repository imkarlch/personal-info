<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information Form</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .form-container {
            width: 100%;
            max-width: 500px;
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 1rem;
            color: #4a90e2;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"] {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus {
            border-color: #4a90e2;
            outline: none;
        }

        .form-container button[type="submit"] {
            width: 100%;
            padding: 0.75rem;
            font-size: 1rem;
            color: #fff;
            background-color: #4a90e2;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button[type="submit"]:hover {
            background-color: #357ABD;
        }

        .form-container .form-footer {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #666;
        }

        .message {
            text-align: center;
            font-size: 1rem;
            padding: 1rem;
            border-radius: 4px;
            margin-top: 1rem;
            display: none;
        }

        .message.success {
            color: #2d862d;
            background-color: #dff0d8;
            border: 1px solid #c3e6cb;
        }

        .message.error {
            color: #a94442;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="form-container">
    <h2>Personal Information Form</h2>
    <form id="personalForm">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone">
        </div>
        <button type="submit">Submit</button>
    </form>
    <div class="form-footer">
        <p>Your information is safe with us. <a href="display.php">Next</a></p>

    </div>
</div>

<script>
    document.getElementById('personalForm').addEventListener('submit', async function(event) {
        event.preventDefault();

        // Collect form data
        const formData = new FormData(this);
        
        // Send AJAX request using fetch
        try {
            const response = await fetch('process.php', {
                method: 'POST',
                body: formData
            });
            const result = await response.text();
            
            // Display SweetAlert message based on response
            if (response.ok) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Data submitted successfully!',
                    confirmButtonColor: '#4a90e2'
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Failed to submit data.',
                    confirmButtonColor: '#e74c3c'
                });
            }
        } catch (error) {
            // Handle network errors or other issues
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: 'An error occurred. Please try again.',
                confirmButtonColor: '#e74c3c'
            });
        }
    });
</script>

</body>
</html>