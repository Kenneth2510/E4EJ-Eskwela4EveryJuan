<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <style>
        /* Reset default margin and padding */
        body, h1, h2, h3, h4, h5, h6, p, table, th, td {
            margin: 0;
            padding: 0;
        }

        /* Set font family */
        body {
            font-family: Arial, sans-serif;
        }

        /* Set basic styling for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Set styling for the headings */
        h1, h2, h3, h4, h5, h6 {
            margin-bottom: 10px;
        }

        /* Set styling for the container */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Set styling for the header */
        .header {
            background-color: #f7f7f7;
            padding: 10px;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Set styling for the title */
        .title {
            font-size: 24px;
            font-weight: bold;
            color: #025c26;
        }

        /* Set styling for the table headings */
        .table-head {
            font-weight: bold;
            background-color: #f2f2f2;
        }

        /* Set styling for the table rows */
        .table-row {
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="datetime">
            <?php echo date('Y-m-d H:i:s'); ?>
        </div>
        <div class="header">
            <h1 class="title">Eskwela4EveryJuan</h1>
            <h2>Instructor Data</h2>
        </div>

        <div class="container">
            <div class="header">
                <h1 class="title">{{ $instructorData->instructor_fname }} {{ $instructorData->instructor_lname }}</h1>
                <h2>instructor Details</h2>
            </div>
    
            <div>
                <h3>Personal Information</h3>
                <p><strong>Account Status:</strong> {{ $instructorData->status }}</p>
                <p><strong>Contact Number:</strong> {{ $instructorData->instructor_contactno }}</p>
                <p><strong>Email Address:</strong> {{ $instructorData->instructor_email }}</p>
                <p><strong>Birthday:</strong> {{ $instructorData->instructor_bday }}</p>
                <p><strong>Gender:</strong> {{ $instructorData->instructor_gender }}</p>
                <p><strong>Date Created:</strong> {{ $instructorData->created_at }}</p>
            </div>
            <br>
            <br>
            <hr>
            <br>
            <div>
                <h3>Course Managed</h3>
                <table>
                    <thead>
                        <th>Course Name</th>
                        <th>Course Status</th>
                        <th>Course Code</th>
                        <th>Difficulty</th>
                        <th>Date Created</th>
                    </thead>
                    <tbody>
                        @forelse ($instructorCourseData as $instructorCourse)
                            <tr>
                                <td>{{$instructorCourse->course_name}}</td>
                                <td>{{$instructorCourse->course_status}}</td>
                                <td>{{$instructorCourse->course_code}}</td>
                                <td>{{$instructorCourse->course_difficulty}}</td>
                                <td>{{$instructorCourse->created_at}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>No Courses Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>
</html>