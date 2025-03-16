<x-filament-panels::page>

    <h1 class="text-xl font-bold text-gray-900 dark:text-gray-100">Crops List</h1>

    <table class="min-w-full mt-4 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">ID</th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Name</th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Planting Date</th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Harvest Date</th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Fertilizers Used</th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Farm</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($this->crops as $crop)
                <tr class="text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700">
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $crop['id'] }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $crop['name'] }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $crop['planting_date'] }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $crop['harvest_date'] }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $crop['fertilizers_used'] }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $crop['farm']['name'] ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1 class="text-xl font-bold mt-6 text-gray-900 dark:text-gray-100">Farms List</h1>

    <table class="min-w-full mt-4 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">ID</th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Name</th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Location</th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Size</th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Total Crops</th>
                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Total Sensors</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($this->farms as $farm)
                <tr class="text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700">
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $farm['id'] }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $farm['name'] }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $farm['location'] }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $farm['size'] }} hectares</td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ count($farm['crops']) }}</td>
                    <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ count($farm['sensors']) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        
        //Tape your script JS here

    </script>
</x-filament-panels::page>
