<!DOCTYPE html>
<html>
<head>
    <title>Employee Management System</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .form-section { margin-bottom: 30px; padding: 15px; border: 1px solid #ccc; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>

    <h1>Employee System</h1>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <div class="form-section">
        <h3>Register New Employee</h3>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <input type="text" name="employee_id" placeholder="Employee ID (e.g. EID-01)" required>
            <input type="text" name="firstname" placeholder="First Name" required>
            <input type="text" name="lastname" placeholder="Last Name" required>
            <select name="department" required>
                <option value="">Select Department</option>
                <option value="IT">IT</option>
                <option value="Math">Math</option>
            </select>
            <button type="submit">Register</button>
        </form>
        @if($errors->any())
            <ul class="error">
                @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        @endif
    </div>

    <div class="form-section">
        <h3>Attendance Login</h3>
        <form action="{{ route('timein') }}" method="POST">
            @csrf
            <input type="text" name="employee_id" placeholder="Enter Your ID to Time In" required>
            <button type="submit">Time In (AM/PM)</button>
        </form>
    </div>

    <h3>Registered Users</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee ID</th>
                <th>Full Name</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $emp)
            <tr>
                <td>{{ $emp->id }}</td>
                <td>{{ $emp->employee_id }}</td>
                <td>{{ $emp->firstname }} {{ $emp->lastname }}</td>
                <td>{{ $emp->department }}</td>
                <td>
                    <a href="{{ route('delete', $emp->id) }}" 
                       onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>