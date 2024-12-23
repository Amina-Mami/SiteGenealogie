<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $person->first_name }} {{ $person->last_name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .person-details {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .person-details h2 {
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 10px;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }

        .person-details ul {
            list-style-type: none;
            padding-left: 0;
            font-size: 1rem;
        }

        .person-details ul li {
            margin: 8px 0;
        }

        .person-details ul li strong {
            color: #4CAF50;
        }

        .back-btn {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1rem;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .back-btn:hover {
            background-color: #0056b3;
        }

        .no-children, .no-parents {
            color: #777;
            font-style: italic;
        }

        @media (max-width: 768px) {
            .container {
                width: 95%;
            }

            h1 {
                font-size: 2rem;
            }

            .person-details h2 {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>{{ $person->first_name }} {{ $person->last_name }}</h1>
</header>

<div class="container">
    <div class="person-details">
        <h2>Details</h2>
        <ul>
            <li><strong>Name:</strong> {{ $person->first_name }} {{ $person->last_name }}</li>
            <li><strong>Birth Name:</strong> {{ $person->birth_name ?? 'N/A' }}</li>
            <li><strong>Date of Birth:</strong> {{ $person->date_of_birth ?? 'N/A' }}</li>
            <li><strong>Created By:</strong> User ID {{ $person->created_by }}</li>
        </ul>
    </div>

    <div class="person-details">
        <h2>Children</h2>
        @if($person->children->isEmpty())
            <p class="no-children">No children found.</p>
        @else
            <ul>
                @foreach($person->children as $child)
                    <li>{{ $child->first_name }} {{ $child->last_name }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="person-details">
        <h2>Parents</h2>
        @if($person->parents->isEmpty())
            <p class="no-parents">No parents found.</p>
        @else
            <ul>
                @foreach($person->parents as $parent)
                    <li>{{ $parent->first_name }} {{ $parent->last_name }}</li>
                @endforeach
            </ul>
        @endif
    </div>

  
    <a href="{{ route('people.index') }}" class="back-btn">Back to List</a>
</div>

</body>
</html>
