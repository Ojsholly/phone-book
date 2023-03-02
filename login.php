<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.17/tailwind.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.css">
</head>
<body class="bg-gray-200">

<div class="flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full sm:w-2/3 md:w-1/2 lg:w-1/3 xl:w-1/4">
        <h1 class="text-3xl font-bold text-center mb-4">Login</h1>
        <form id="login-form">
            <div class="mb-4">
                <label for="email" class="block font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="johndoe@example.com">
            </div>
            <div class="mb-4">
                <label for="password" class="block font-bold mb-2">Password</label>
                <input type="password" id="password" name="password" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="********">
            </div>
            <div class="mb-6">
                <button type="submit" id="login-btn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full sm:w-auto">Login</button>
            </div>
            <p class="text-sm text-center text-gray-600">Don't have an account? <a href="register.php" class="text-blue-500 hover:text-blue-700">Register here</a>.</p>
        </form>
    </div>
</div>

<script>
    $(function() {
        $('#login-form').submit(function(e) {
            e.preventDefault();
            const email = $('#email').val();
            const password = $('#password').val();

            // validate inputs
            if (email === '' || password === '') {
                Swal.fire('Error', 'All fields are required.', 'error');
                return;
            }

            // make ajax request to backend
            $.ajax({
                url: '/login',
                method: 'POST',
                data: {
                    email: email,
                    password: password
                },
                success: function(response) {
                    Swal.fire('Success', response.message, 'success');
                },
                error: function(xhr) {
                    if (xhr.status === 401) {
                        Swal.fire('Error', 'Invalid email or password.', 'error');
                    } else {
                        Swal.fire('Error', 'An error occurredwhile processing your request. Please try again later.', 'error');
                    }
                }
            });
        });
    });
</script>
</body>
</html>