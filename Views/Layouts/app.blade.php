<!DOCTYPE html>
<html lang="en">
<head>
   <title>
       @yield('title')
   </title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
   <nav class="nav">
       <a href="/faculty" class="nav-link">Faculty</a>
       <a href="/grade" class="nav-link">Grade</a>
       <a href="/student" class="nav-link">Student</a>
       <a href="/course" class="nav-link">Course</a>
   </nav>
   <div class="container">
       @yield('content')
   </div>
</form>
</body>
</html>