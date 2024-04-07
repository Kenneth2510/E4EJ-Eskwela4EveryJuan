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
    margin: 0; /* Ensure no margin on the body */
    padding: 0; /* Ensure no padding on the body */
    font-size: 12px;
}

/* Set basic styling for the table */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 4px;
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
    max-width: 1500px; /* A4 paper width in landscape orientation */
    margin: 0; /* Center the container horizontally */
    padding: 20px;
    background-color: #fff; /* Add a background color to the container */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a box shadow for better visibility */
    overflow-x: hidden; /* Hide horizontal overflow */
}

/* Set styling for the header */
.header {
    background-color: #f7f7f7;
    padding: 10px;
    text-align: center;
    margin-bottom: 20px;
}

/* Set styling for the image */
.header img {
    width: 85%; /* Adjust the width as needed */
    margin: 0 auto; /* Center the image */
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

tr {
    page-break-inside: avoid;
}


/* Additional styles for landscape orientation */
@media print and (orientation: landscape) {
    /* Adjust container width for landscape */
    .container {
        width: 150vw; /* Full width of the viewport */
        height: 100vh; /* Full height of the viewport */
        margin: 0; /* Remove margin to fill the viewport */
        padding: 20px; /* Add padding for better readability */
    }

    /* Adjust image size for landscape */
    .header img {
        width: 100%; /* Adjust the width to fill the container */
    }

    
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
            
            {{-- <img src="{{ asset('assets/e4ej_logo-landscape.png') }}" alt=""> --}}
            {{-- <img src="../storage/public/images/e4ej_logo-landscape.png" alt=""> --}}

            <h2>Learner Data</h2>
        </div>
        <table>
            <thead>
                <tr class="table-head">
                    @foreach($headers as $key => $header)
                        <th>{{ $header }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @forelse($learners as $learner)
                    <tr>
                        @foreach($headers as $key => $header)
                            <td>{{ $learner->$key }}</td>
                        @endforeach
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($headers) }}">No learners found</td>
                    </tr>
                @endforelse
                <tr>
                    <td colspan="{{ count($headers) }}">Total: {{ count($learners) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
