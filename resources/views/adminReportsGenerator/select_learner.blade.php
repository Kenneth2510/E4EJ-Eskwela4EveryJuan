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
            <h2>Learner Data</h2>
        </div>

        <div class="container">
            <div class="header">
                <h1 class="title">{{ $learnerData->learner_fname }} {{ $learnerData->learner_lname }}</h1>
                <h2>Learner Details</h2>
            </div>
    
            <div>
                <h3>Personal Information</h3>
                <p><strong>Account Status:</strong> {{ $learnerData->status }}</p>
                <p><strong>Contact Number:</strong> {{ $learnerData->learner_contactno }}</p>
                <p><strong>Email Address:</strong> {{ $learnerData->learner_email }}</p>
                <p><strong>Birthday:</strong> {{ $learnerData->learner_bday }}</p>
                <p><strong>Gender:</strong> {{ $learnerData->learner_gender }}</p>
                <p><strong>Date Created:</strong> {{ $learnerData->created_at }}</p>
            </div>
            <br>
            <br>
            <hr>
            <br>
            <div>
                <h3>Business Information</h3>
                <p><strong>Name:</strong> {{ $businessData->business_name }}</p>
                <p><strong>Address:</strong> {{ $businessData->business_address }}</p>
                <p><strong>Owner Name:</strong> {{ $businessData->business_owner_name }}</p>
                <p><strong>Account Number:</strong> {{ $businessData->bplo_account_number }}</p>
                <p><strong>Category:</strong> {{ $businessData->business_category }}</p>
                <p><strong>Classification:</strong> {{ $businessData->business_classification }}</p>
                <p><strong>Description:</strong> {{ $businessData->business_description }}</p>
            </div>
            <br>
            <br>
            <hr>
            <br>
            <div>
                <h3>Course Progress</h3>
                <table>
                    <thead>
                        <th>Course Name</th>
                        <th>Enrollment Status</th>
                        <th>Course Progress</th>
                        <th>Start Period</th>
                    </thead>
                    <tbody>
                        @forelse ($learnerCourseData as $learnerCourse)
                            <tr>
                                <td>{{$learnerCourse->course_name}}</td>
                                <td>{{$learnerCourse->enrollment_status}}</td>
                                <td>{{$learnerCourse->course_progress}}</td>
                                <td>{{$learnerCourse->start_period}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>No Course Progress Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>
</html>