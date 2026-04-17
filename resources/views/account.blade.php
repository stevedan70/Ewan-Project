@php
    $user = null;

    if (request()->get('id')) {
        $user = DB::table('users')->where('id', request()->get('id'))->first();
    }
@endphp

<x-layout>
    @include('components.header')

    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="grid grid-cols-2 gap-6">
            <!-- Card 1 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800 mb-6">Change Password</h3>

                    <form action="#" method="POST" id="form">
                        <div class="mb-6">
                            <label for="old_password" class="block text-gray-700">Old Password</label>
                            <input type="text" id="old_password" name="old_password" value=""
                                   class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>

                        <div class="mb-6">
                            <label for="new_password" class="block text-gray-700">New Password</label>
                            <input type="text" id="new_password" name="new_password" value=""
                                   class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>

                        <div class="mb-6">
                            <label for="confirm_new_password" class="block text-gray-700">Confirm New Password</label>
                            <input type="text" id="confirm_new_password" name="confirm_new_password" value=""
                                   class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>

                        <button type="submit"
                                class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 mb-3">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Get form element
        const form = document.getElementById('form');

        form.addEventListener('submit', async function (event) {
            event.preventDefault(); // Prevent the form from submitting normally

            // Get form data
            const oldPassword = document.getElementById('old_password').value;
            const newPassword = document.getElementById('new_password').value;
            const confirmNewPassword = document.getElementById('confirm_new_password').value;

            // Create an object to hold the data
            const formData = {
                token: "{{session()->get('token')}}",

                old_password: oldPassword,
                new_password: newPassword,
                confirm_new_password: confirmNewPassword,
            };

            try {
                // Send the data to the server using fetch
                const response = await fetch('{{env('APP_URL')}}/api/account', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(formData)
                });

                // Handle the response from the server
                if (response.ok) {
                    alert('Password successfully change');
                    location.reload();
                } else {
                    const data = await response.json();
                    console.error('Changing password failed:', data);
                    alert('Changing password failed ' + data.error);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Oops something went wrong, ' + error);
            }
        });
    </script>
</x-layout>
