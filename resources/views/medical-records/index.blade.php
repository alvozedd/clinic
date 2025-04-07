@extends('layouts.base')

@section('title', 'My Medical Records')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">My Medical Records</h1>

    @if($records->isEmpty())
        <div class="bg-blue-50 p-4 rounded-lg">
            <p>No medical records found.</p>
        </div>
    @else
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left">Date</th>
                        <th class="px-6 py-3 text-left">Doctor</th>
                        <th class="px-6 py-3 text-left">Diagnosis</th>
                        <th class="px-6 py-3 text-left">Treatment</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($records as $record)
                    <tr>
                        <td class="px-6 py-4">{{ $record->visit_date->format('M d, Y') }}</td>
                        <td class="px-6 py-4">Dr. {{ $record->doctor->user->last_name }}</td>
                        <td class="px-6 py-4">{{ Str::limit($record->diagnosis, 30) }}</td>
                        <td class="px-6 py-4">{{ Str::limit($record->treatment, 30) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-6 py-4">
                {{ $records->links() }}
            </div>
        </div>
    @endif
</div>
@endsection