<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Person</title>
    <style>
     
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

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-group input:focus {
            border-color: #3498db;
            outline: none;
        }

        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            height: 100px;
            resize: vertical;
        }

        .form-group textarea:focus {
            border-color: #3498db;
            outline: none;
        }

        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-group select:focus {
            border-color: #3498db;
            outline: none;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            margin-top: 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            width: 100%;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #2980b9;
        }

      
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 2rem;
            }

            .btn {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <h1>Create New Person</h1>
    <div class="container">
        <form action="{{ route('people.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" placeholder="Enter first name" value="{{ old('first_name') }}" required>
                @error('first_name')
                    <div style="color: red; font-size: 0.9rem;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" placeholder="Enter last name" value="{{ old('last_name') }}" required>
                @error('last_name')
                    <div style="color: red; font-size: 0.9rem;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="birth_name">Birth Name</label>
                <input type="text" name="birth_name" id="birth_name" placeholder="Enter birth name" value="{{ old('birth_name') }}">
                @error('birth_name')
                    <div style="color: red; font-size: 0.9rem;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="middle_names">Middle Names</label>
                <input type="text" name="middle_names" id="middle_names" placeholder="Enter middle names" value="{{ old('middle_names') }}">
                @error('middle_names')
                    <div style="color: red; font-size: 0.9rem;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" required>
                @error('date_of_birth')
                    <div style="color: red; font-size: 0.9rem;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="created_by">Created By (User ID)</label>
                <select name="created_by" id="created_by" required>
    <option value="">Select User</option>
    @foreach($users as $user)
        <option value="{{ $user->id }}" {{ old('created_by') == $user->id ? 'selected' : '' }}>
            {{ $user->name }}
        </option>
    @endforeach
</select>

                @error('created_by')
                    <div style="color: red; font-size: 0.9rem;">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">Create Person</button>
        </form>
    </div>
</body>
</html>
