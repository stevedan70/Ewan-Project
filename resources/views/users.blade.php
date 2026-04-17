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
                    @if(request()->get('id'))
                        <h3 class="text-xl font-semibold text-gray-800">Edit User</h3>
                    @else
                        <h3 class="text-xl font-semibold text-gray-800">Create a New User</h3>
                    @endif

                    <form action="#" method="POST" id="form">
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Full Name*</label>
                            <input type="text" id="name" name="name"
                                   value="{{$user ? $user->name : ''}}"
                                   class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label for="birthday" class="block text-gray-700">Birthday</label>
                            <input type="date" id="birthday" name="birthday"
                                   value="{{$user ? $user->birthday : ''}}"
                                   class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>

                        <div class="mb-4">
                            <label for="id_number" class="block text-gray-700">ID Number</label>
                            <input type="text" id="id_number" name="id_number"
                                   value="{{$user ? $user->id_number : ''}}"
                                   class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>

                        <div class="mb-4">
                            <label for="username" class="block text-gray-700">Username*</label>
                            <input type="text" id="username" name="username"
                                   value="{{$user ? $user->username : ''}}"
                                   class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                   required>
                        </div>

                        <div class="mb-6">
                            <label for="password" class="block text-gray-700">Password{{$user ? '' : '*'}}</label>
                            <input type="text" id="password" name="password" value="{{$user ? '' : Str::random(6)}}"
                                   class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>

                        <div class="mb-6">
                            <label for="password" class="block text-gray-700">Role*</label>
                            <select name="role" id="role"
                                    class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <option value="">-- Select Role --</option>
                                <option value="admin" {{$user ? $user->role === 'admin' ? 'selected' : '' : ''}}>Admin
                                </option>
                                <option value="student" {{$user ? $user->role === 'student' ? 'selected' : '' : ''}}>Student
                                </option>
                            </select>
                        </div>

                        <button type="submit"
                                class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 mb-3">
                            Save
                        </button>
                    </form>

                    @if(request()->get('id'))
                        <a href="/users"
                           class="block w-full bg-gray-300 text-white py-2 rounded-lg hover:bg-gray-500 px-6 text-center">Cancel</a>
                    @endif
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800">Users</h3>
                    <div class="max-w-4xl mx-auto mt-4">
                        <table class="min-w-full table-auto border-collapse border border-gray-300">
                            <thead>
                            <tr>
                                <th class="px-4 py-2 border-b text-left font-semibold text-gray-800">Name</th>
                                <th class="px-4 py-2 border-b text-left font-semibold text-gray-800">Username</th>
                                <th class="px-4 py-2 border-b text-left font-semibold text-gray-800">Role</th>
                                <th class="px-4 py-2 border-b text-left font-semibold text-gray-800">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(DB::table('users')->get() as $user)
                                <tr>
                                    <td class="px-4 py-2 border-b text-gray-700">{{$user->name}}</td>
                                    <td class="px-4 py-2 border-b text-gray-700">{{$user->username}}</td>
                                    <td class="px-4 py-2 border-b text-gray-700">{{$user->role}}</td>
                                    <td class="px-4 py-2 border-b text-gray-700">
                                        <a href="/users?id={{$user->id}}" class="me-2 text-blue-500">Edit</a>
                                        <a href="/users/delete?id={{$user->id}}" class="text-red-500">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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
            const name = document.getElementById('name').value;
            const birthday = document.getElementById('birthday').value;
            const idNumber = document.getElementById('id_number').value;
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const role = document.getElementById('role').value;

            // Create an object to hold the data
            const formData = {
                token: "{{session()->get('token')}}",

                id: "{{request()->get('id') ? request()->get('id') : ''}}",
                name: name,
                birthday: birthday,
                id_number: idNumber,
                username: username,
                password: password,
                role: role,
            };

            try {
                // Send the data to the server using fetch
                const response = await fetch('{{env('APP_URL')}}/api/users', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(formData)
                });

                // Handle the response from the server
                if (response.ok) {
                    location.reload();
                } else {
                    const data = await response.json();
                    console.error('User failed:', data);
                    alert('User failed ' + data.error);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Oops something went wrong, ' + error);
            }
        });
    </script>
</x-layout>
