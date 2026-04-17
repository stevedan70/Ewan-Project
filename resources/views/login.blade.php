<x-layout>
    <div class="bg-gray-100 h-screen flex items-center justify-center">
        <div class="w-full max-w-sm bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Login</h2>

            <form action="#" method="POST" id="login-form">
                <div class="mb-4">
                    <label for="username" class="block text-gray-700">Username</label>
                    <input type="text" id="username" name="username"
                           class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                           required>
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password" name="password"
                           class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                           required>
                </div>

                <button type="submit"
                        class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    Log In
                </button>
            </form>
        </div>
    </div>

    <script>
        // Get form element
        const form = document.getElementById('login-form');

        form.addEventListener('submit', async function (event) {
            event.preventDefault(); // Prevent the form from submitting normally

            // Get form data
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            // Create an object to hold the data
            const formData = {
                username: username,
                password: password
            };

            try {
                // Send the data to the server using fetch
                const response = await fetch('{{env('APP_URL')}}/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(formData)
                });

                // Handle the response from the server
                if (response.ok) {
                    const data = await response.json();
                    console.log('Login successful:', data);
                    window.location.href = '/dashboard';
                } else {
                    const data = await response.json();
                    console.error('Login failed:', data);
                    alert('Login failed ' + data.error);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Oops something went wrong, ' + error);
            }
        });
    </script>
</x-layout>
