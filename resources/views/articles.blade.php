@php
    $article = null;

    if (request()->get('id')) {
        $article = DB::table('articles')->where('id', request()->get('id'))->first();
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
                        <h3 class="text-xl font-semibold text-gray-800">Edit Article</h3>
                    @else
                        <h3 class="text-xl font-semibold text-gray-800">Create a New Article</h3>
                    @endif

                    <form action="#" method="POST" id="form">
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700">Title*</label>
                            <input type="text" id="title" name="title"
                                   value="{{$article ? $article->title : ''}}"
                                   class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-gray-700">Content*</label>
                            <textarea
                                rows="5"
                                id="content" name="content"
                                class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">{{$article ? $article->content : ''}}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="reading_time" class="block text-gray-700">Reading Time*</label>
                            <input type="text" id="reading_time" name="reading_time"
                                   value="{{$article ? $article->reading_time : ''}}"
                                   class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label for="publish_date" class="block text-gray-700">Publish Date*</label>
                            <input type="date" id="publish_date" name="publish_date"
                                   value="{{$article ? $article->publish_date : ''}}"
                                   class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                   required>
                        </div>

                        <button type="submit"
                                class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 mb-3">
                            Save
                        </button>
                    </form>

                    @if(request()->get('id'))
                        <a href="/articles"
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
                                <th class="px-4 py-2 border-b text-left font-semibold text-gray-800">Title</th>
                                <th class="px-4 py-2 border-b text-left font-semibold text-gray-800">Content</th>
                                <th class="px-4 py-2 border-b text-left font-semibold text-gray-800">Reading Time</th>
                                <th class="px-4 py-2 border-b text-left font-semibold text-gray-800">Publish Date</th>
                                <th class="px-4 py-2 border-b text-left font-semibold text-gray-800">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(DB::table('articles')->get() as $article)
                                <tr>
                                    <td class="px-4 py-2 border-b text-gray-700">{{$article->title}}</td>
                                    <td class="px-4 py-2 border-b text-gray-700">{{\Illuminate\Support\Str::limit($article->content, 50)}}</td>
                                    <td class="px-4 py-2 border-b text-gray-700">{{$article->reading_time}}</td>
                                    <td class="px-4 py-2 border-b text-gray-700">{{$article->publish_date}}</td>
                                    <td class="px-4 py-2 border-b text-gray-700">
                                        <a href="/articles?id={{$article->id}}" class="me-2 text-blue-500">Edit</a>
                                        <a href="/articles/delete?id={{$article->id}}" class="text-red-500">Delete</a>
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
            const title = document.getElementById('title').value;
            const content = document.getElementById('content').value;
            const readingTime = document.getElementById('reading_time').value;
            const publishDate = document.getElementById('publish_date').value;

            // Create an object to hold the data
            const formData = {
                token: "{{session()->get('token')}}",

                id: "{{request()->get('id') ? request()->get('id') : ''}}",
                title: title,
                content: content,
                reading_time: readingTime,
                publish_date: publishDate,
            };

            try {
                // Send the data to the server using fetch
                const response = await fetch('{{env('APP_URL')}}/api/articles', {
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
                    console.error('Articles failed:', data);
                    alert('Article failed ' + data.error);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Oops something went wrong, ' + error);
            }
        });
    </script>
</x-layout>
