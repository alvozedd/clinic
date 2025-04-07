<h1>Patients Report</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact Number</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($patients as $patient)
        <tr>
            <td>{{ $patient->id }}</td>
            <td>{{ $patient->name }}</td>
            <td>{{ $patient->email }}</td>
            <td>{{ $patient->contact_number }}</td>
        </tr>
        @endforeach
    </tbody>
</table>