<x-app-layout>
    <x-slot name="header">

        <div class="container">
            <h1>Date Details</h1>

            <table class="table">
                <tr>
                    <th>ID</th>
                    <td>{{ $date->id }}</td>
                </tr>
                <tr>
                    <th>Day</th>
                    <td>{{ $date->day }}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{ $date->date }}</td>
                </tr>
                <tr>
                    <th>Minute</th>
                    <td>{{ $date->minute }}</td>
                </tr>
                <tr>
                    <th>Second</th>
                    <td>{{ $date->second }}</td>
                </tr>
            </table>

            <a href="{{ route('dates.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </x-slot>

</x-app-layout>