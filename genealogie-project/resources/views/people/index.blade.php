<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>People List</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5rem;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
            font-size: 1.1rem;
        }

        td {
            background-color: #ffffff;
            font-size: 1rem;
        }

        tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        tr:hover td {
            background-color: #f1f1f1;
        }

        @media (max-width: 768px) {
            table {
                font-size: 0.9rem;
            }

            th, td {
                padding: 10px;
            }

            h1 {
                font-size: 2rem;
            }
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            margin: 10px 0;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .message {
            font-size: 1rem;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            margin-left:550px;
            text-align: center;
            width: 200px;
        }

        .success {
            background-color: #28a745;
            color: white;
        }

        .error {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <h1 class="mt-5">People List</h1>

   
    @if(session('success'))
        <div id="successMessage" class="message success">
            {{ session('success') }}
        </div>
    @endif

   
    @if(session('error'))
        <div id="errorMessage" class="message error">
            {{ session('error') }}
        </div>
    @endif

    <a href="{{ route('people.create') }}" class="btn">Add New Person</a>
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birth Name</th>
                <th>Middle Names</th>
                <th>Date of Birth</th>
                <th>Created By</th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            @foreach($people as $person)
                <tr>
                    <td>{{ $person->first_name }}</td>
                    <td>{{ $person->last_name }}</td>
                    <td>{{ $person->birth_name ?? 'N/A' }}</td>
                    <td>{{ $person->middle_names ?? 'N/A' }}</td>
                    <td>{{ $person->date_of_birth ? \Carbon\Carbon::parse($person->date_of_birth)->format('d-m-Y') : 'N/A' }}</td>
                    <td>{{ $person->created_by }}</td>
                    <td>
                        <a href="{{ route('people.show', $person->id) }}">
                            <button class="btn btn-danger">Details</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        window.onload = function() {
            const successMessage = document.getElementById('successMessage');
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 3000); 
            }

            const errorMessage = document.getElementById('errorMessage');
            if (errorMessage) {
                setTimeout(function() {
                    errorMessage.style.display = 'none';
                }, 3000); 
            }
        };
    </script>
</body>
</html>
