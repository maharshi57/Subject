<!DOCTYPE html>
<html>
<head>
    <title>Color Picker Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="path/to/jquery.colorpicker.js"></script>
    <link rel="stylesheet" href="path/to/jquery.colorpicker.css">
</head>
<body>
    <form method="post" action="{{ route('add') }}">
    @csrf
    <lable>Subject Name</lable>
    <input type="text" name="name" placeholder="english">
    <lable>Subject Code</lable>
    <input type="number" name="subject_code" placeholder="000000">
    <label>Choose color</label>
    <input type="text" id="colorPicker">
    <button type= "submit">Add Subject</button>
    </form>

    <script>
        $(document).ready(function() {
            $('#colorPicker').colorpicker();
        });
    </script>

</body>
</html>
