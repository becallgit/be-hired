<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTROL PANEL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
            body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            overflow: hidden; 
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #fff;
            border-right: 1px solid #ddd;
            padding: 20px;
            transition: width 0.3s;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            position: relative; 
        }

        .sidebar.collapsed {
            width: 70px; 
        }

        .toggle-btn {
            border: none;
            background: none;
            font-size: 20px;
            cursor: pointer;
            position: absolute;
            top: 20px; 
            left: 180px;
            transition: left 0.3s, top 0.3s;  
        }

        .sidebar.collapsed .toggle-btn {
            left: -1px;  

        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 10px;
            transition: padding 0.3s;
        }

        .sidebar.collapsed .menu-item {
            padding: 10px;
        }

        .menu-item span {
            margin-left: 10px;
            transition: opacity 0.3s, margin-left 0.3s;
        }

        .sidebar.collapsed .menu-item span {
            opacity: 0;
            margin-left: -9999px;
        }

        .imagen, p {
            transition: opacity 0.3s, height 0.3s;
            display: block;
            margin-bottom: 10px;
        }

        .sidebar.collapsed .imagen, .sidebar.collapsed p {
            opacity: 0;
            height: 0;
            overflow: hidden;
        }

    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div style="position: relative;"> 
            <img class="imagen" id="img" src="{{ asset('images/logolargo.png') }}" width="150">
            <button class="toggle-btn" onclick="toggleSidebar()">
                <i class="fa-solid fa-arrow-right-to-bracket"></i>
            </button>
        </div>
        <p id="menu-text">MENU PRINCIPAL</p>
        <div class="menu-item"><i class="fa-solid fa-border-all"></i><span>Panel de control</span></div>
        <div class="menu-item"><i class="fa-regular fa-user"></i><span>Personal</span></div>
        <div class="menu-item"><i class="fa-solid fa-folder-open"></i><span>Proyectos</span></div>
        <div class="menu-item"><i class="fa-solid fa-book"></i><span>Formación</span></div>

   

    </div>
    <a href="{{ route('personal.form') }}">Nuevo Personal</a>
    <a href="{{ route('project.form') }}">Nuevo Proyecto</a>
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('collapsed');
        }
    </script>
</body>
</html>
