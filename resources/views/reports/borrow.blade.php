<!DOCTYPE html>
<html>
<head>
    <title>Borrow Report</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Borrow Report</h2>
    <table>
        <thead>
            <tr>
                <th>Student</th>
                <th>Equipment</th>
                <th>Borrow Date</th>
                <th>Due Date</th>
                <th>Return Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $r)
            <tr>
                <td>{{ $r->student->name }} ({{ $r->student->student_id }})</td>
                <td>{{ $r->equipment->name }}</td>
                <td>{{ $r->borrow_date }}</td>
                <td>{{ $r->due_date }}</td>
                <td>{{ $r->return_date ?? '-' }}</td>
                <td>{{ $r->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
