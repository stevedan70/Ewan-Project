<x-layout>
    @include('components.header')

    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800">Users</h3>
                    <p class="mt-2 text-gray-600">List of users</p>
                    <div class="mt-4">
                        <a href="/users" class="text-indigo-600 hover:text-indigo-800 font-medium">Manage Users</a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800">Articles</h3>
                    <p class="mt-2 text-gray-600">Manage articles like create, edit and delete</p>
                    <div class="mt-4">
                        <a href="/articles" class="text-indigo-600 hover:text-indigo-800 font-medium">Manage Articles</a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800">Reports</h3>
                    <p class="mt-2 text-gray-600">Manage received reports</p>
                    <div class="mt-4">
                        <a href="/reports" class="text-indigo-600 hover:text-indigo-800 font-medium">Manage Reports</a>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800">Account Settings</h3>
                    <p class="mt-2 text-gray-600">You profile settings</p>
                    <div class="mt-4">
                        <a href="/account" class="text-indigo-600 hover:text-indigo-800 font-medium">Manage Account Settings</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6 mt-6">
            <div>
                <div class="grid grid-cols-2 gap-6 mt-12">
                    <!-- Card 1 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="p-4">
                            <h3 class="text-6xl font-semibold text-gray-800">
                                {{DB::table('reports')->where('status', 'Pending')->count()}}
                            </h3>
                            <p class="mt-2 text-gray-600">Pending Reports</p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="p-4">
                            <h3 class="text-6xl font-semibold text-gray-800">
                                {{DB::table('reports')->where('status', 'Resolved')->count()}}
                            </h3>
                            <p class="mt-2 text-gray-600">Resolved Reports</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mt-12">
                    <!-- Card 1 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="p-4">
                            <h3 class="text-6xl font-semibold text-gray-800">
                                {{DB::table('reports')->where('category', 'Physical bullying')->count()}}
                            </h3>
                            <p class="mt-2 text-gray-600">Physical Bullying</p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="p-4">
                            <h3 class="text-6xl font-semibold text-gray-800">
                                {{DB::table('reports')->where('category', 'Verbal bullying')->count()}}
                            </h3>
                            <p class="mt-2 text-gray-600">Verbal Reports</p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="p-4">
                            <h3 class="text-6xl font-semibold text-gray-800">
                                {{DB::table('reports')->where('category', 'Social bullying')->count()}}
                            </h3>
                            <p class="mt-2 text-gray-600">Social Bullying</p>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="p-4">
                            <h3 class="text-6xl font-semibold text-gray-800">
                                {{DB::table('reports')->where('category', 'Cyber bullying')->count()}}
                            </h3>
                            <p class="mt-2 text-gray-600">Cyber Bullying</p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</x-layout>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Physical bullying', 'Verbal bullying', 'Social bullying', 'Cyber bullying'],
            datasets: [{
                label: '# of Votes',
                data: [
                    {{DB::table('reports')->where('category', 'Physical bullying')->count()}},
                    {{DB::table('reports')->where('category', 'Verbal bullying')->count()}},
                    {{DB::table('reports')->where('category', 'Social bullying')->count()}},
                    {{DB::table('reports')->where('category', 'Cyber bullying')->count()}}
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
