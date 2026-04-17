@php
    $report = null;
    $categories = ['Physical bullying', 'Verbal bullying', 'Social bullying', 'Cyber bullying'];
    $statuses = ['Pending', 'Resolved', 'Escalate', 'Followup'];

    if (request()->get('id')) {
        $report = DB::table('reports')->where('id', request()->get('id'))->first();
    }
@endphp

<x-layout>
    @include('components.header')

    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="grid grid-cols-2 gap-6">
            <!-- Card 1 -->
            <div class="bg-white p-6 border rounded-lg shadow-md">
                <div class="p-4">
                    @if(request()->get('id'))
                        <h3 class="text-xl font-semibold text-gray-800">Edit Report</h3>
                    @else
                        <h3 class="text-xl font-semibold text-gray-800">Create a New Report</h3>
                    @endif

                    <form action="#" method="POST" id="form">
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700">Category*</label>
                            <select name="category" id="category"
                                    class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <option value="">-- Select Category --</option>
                                @foreach($categories as $item)
                                    <option
                                        value="{{$item}}" {{$report ? $report->category === $item ? 'selected' : '' : ''}}>
                                        {{$item}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="location" class="block text-gray-700">Location*</label>
                            <input type="text" id="location" name="location"
                                   value="{{$report ? $report->location : ''}}"
                                   class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>

                        <div class="mb-4">
                            <label for="date_time" class="block text-gray-700">Date*</label>
                            <input type="date" id="date_time" name="date_time"
                                   value="{{$report ? $report->date_time : ''}}"
                                   class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>

                        <div class="mb-4">
                            <label for="involved_student_name" class="block text-gray-700">Involved Student
                                Name*</label>
                            <input type="text" id="involved_student_name" name="involved_student_name"
                                   value="{{$report ? $report->involved_student_name : ''}}"
                                   class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>

                        <div class="mb-4">
                            <label for="title" class="block text-gray-700">Status*</label>
                            <select name="status" id="status"
                                    class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <option value="">-- Select Status --</option>
                                @foreach($statuses as $item)
                                    <option
                                        value="{{$item}}" {{$report ? $report->status === $item ? 'selected' : '' : ''}}>
                                        {{$item}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">Description*</label>
                            <textarea
                                rows="5"
                                id="description" name="description"
                                class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">{{$report ? $report->description : ''}}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="file_1" class="block text-gray-700">File 1</label>
                            <input type="file" id="file_1" name="file_1"
                                   class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                            @if(request()->get('id') && $report && $report->file_1)
                                <a href="/storage/uploads/{{$report->file_1}}"
                                   target="_blank"
                                   class="text-blue-600 hover:underline">Download</a>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="file_2" class="block text-gray-700">File 2</label>
                            <input type="file" id="file_2" name="file_2"
                                   class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                            @if(request()->get('id') && $report && $report->file_2)
                                <a href="/storage/uploads/{{$report->file_2}}"
                                   target="_blank"
                                   class="text-blue-600 hover:underline">Download</a>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="file_3" class="block text-gray-700">File 3</label>
                            <input type="file" id="file_3" name="file_3"
                                   class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                            @if(request()->get('id') && $report && $report->file_3)
                                <a href="/storage/uploads/{{$report->file_3}}"
                                   target="_blank"
                                   class="text-blue-600 hover:underline">Download</a>
                            @endif
                        </div>

                        <button type="submit"
                                class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 mb-3">
                            Save
                        </button>
                    </form>

                    @if(request()->get('id'))
                        <a href="/reports"
                           class="block w-full bg-gray-300 text-white py-2 rounded-lg hover:bg-gray-500 px-6 text-center">Cancel</a>
                    @endif
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-6 border rounded-lg shadow-md">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800">Users</h3>
                    <div class="max-w-4xl mx-auto mt-4">
                        <table class="min-w-full table-auto border-collapse border border-gray-300">
                            <thead>
                            <tr>
                                <th class="px-4 py-2 border-b text-left font-semibold text-gray-800">Category</th>
                                <th class="px-4 py-2 border-b text-left font-semibold text-gray-800">Description</th>
                                <th class="px-4 py-2 border-b text-left font-semibold text-gray-800">Status</th>
                                <th class="px-4 py-2 border-b text-left font-semibold text-gray-800">Date</th>
                                <th class="px-4 py-2 border-b text-left font-semibold text-gray-800">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(DB::table('reports')->get() as $item)
                                <tr>
                                    <td class="px-4 py-2 border-b text-gray-700">{{$item->category}}</td>
                                    <td class="px-4 py-2 border-b text-gray-700">{{\Illuminate\Support\Str::limit($item->description, 50)}}</td>
                                    <td class="px-4 py-2 border-b text-gray-700">{{$item->status}}</td>
                                    <td class="px-4 py-2 border-b text-gray-700">{{$item->date_time}}</td>
                                    <td class="px-4 py-2 border-b text-gray-700">
                                        <a href="/reports?id={{$item->id}}" class="me-2 text-blue-500">Edit</a>
                                        <a href="/reports/delete?id={{$item->id}}" class="text-red-500">Delete</a>
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
            const category = document.getElementById('category').value;
            const loc = document.getElementById('location').value;
            const date_time = document.getElementById('date_time').value;
            const involved_student_name = document.getElementById('involved_student_name').value;
            const status = document.getElementById('status').value;
            const description = document.getElementById('description').value;
            let file_1 = document.getElementById('file_1');
            let file_2 = document.getElementById('file_2');
            let file_3 = document.getElementById('file_1');

            // Create an object to hold the data
            const formData = new FormData();
            formData.append('token', "{{session()->get('token')}}");
            formData.append('id', "{{request()->get('id') ? request()->get('id') : ''}}");
            formData.append('category', category);
            formData.append('location', loc);
            formData.append('date_time', date_time);
            formData.append('involved_student_name', involved_student_name);
            formData.append('status', status);
            formData.append('description', description);
            if (file_1.files.length > 0) formData.append('file_1', file_1.files[0]);
            if (file_2.files.length > 0) formData.append('file_2', file_2.files[0]);
            if (file_3.files.length > 0) formData.append('file_3', file_3.files[0]);

            try {
                // Send the data to the server using fetch
                const response = await fetch('{{env('APP_URL')}}/api/reports', {
                    method: 'POST',
                    body: formData
                });

                // Handle the response from the server
                if (response.ok) {
                    location.reload();
                } else {
                    const data = await response.json();
                    console.error('Report failed:', data);
                    alert('Report failed ' + data.error);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Oops something went wrong, ' + error);
            }
        });
    </script>
</x-layout>
