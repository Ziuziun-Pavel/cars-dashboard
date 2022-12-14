<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/cars-dashboard/public/css/font-awesome.min.css">
    <link rel="stylesheet" href="/cars-dashboard/public/css/style.css">
</head>
<body>

<div class="mt-5 ml-auto mr-auto w-8/12">
    <div class="mb-5">
        <h1 class="inline-block text-3xl font-bold underline">The average price on cars sold for all time:</h1>
        <h2 class="inline-block text-2xl font-semibold text-yellow-600">{{ avPriceOfAllCars }} $</h2>
    </div>

    <div class="mb-5">
        <h1 class="inline-block text-3xl font-bold underline">The average price on cars sold for today:</h1>
        {% if avPriceOfTodayCars %}
        <h2 class="inline-block text-2xl font-semibold text-yellow-600">{{ avPriceOfTodayCars }} $</h2>
        {% else %}
        <p class="inline-block text-2xl font-semibold text-red-600">Nothing were sold(</p>
        {% endif %}
    </div>

    <div>
        <h1 class="text-3xl font-bold underline mb-5">Cars sold last year:</h1>

        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full border text-center">
                            <thead class="border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                    Date
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                    Number of cars sold
                                </th>

                            </tr>
                            </thead>

                            <tbody>
                            {% for car in carsSoldLastYear %}
                            <tr class="border-b">
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                    {{ car['date_of_sale'] }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                    {{ car['count'] }}
                                </td>
                            </tr>
                            {% endfor %}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div>
        <h1 class="text-3xl font-bold underline mb-5">Unsold cars:</h1>

        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full border text-center">
                            <thead class="border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                    Car model
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                    Year of production
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                    Color
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                    Price
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            {% for car in unsoldCars %}
                            <tr class="border-b">
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                    {{ car['model'] }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                    {{ car['year_of_production'] }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                    {{ car['color'] }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">
                                    {{ car['price'] }}
                                </td>
                            </tr>
                            {% endfor %}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>



</div>

<script src="https://cdn.tailwindcss.com"></script>
<script src="/cars-dashboard/public/js/script.js"></script>
</body>
</html>
