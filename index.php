<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Лабиринт</title>
  <style>
    .form-group {
      margin-bottom: 10px;
    }
    .form-group label {
      display: inline-block;
      width: 80px;
    }
    .form-group input,
    .form-group textarea {
      display: inline-block;
      width: 200px;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 3px;
      box-sizing: border-box;
    }
    .form-group input[type="submit"] {
      width: auto;
      padding: 5px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
    .form-group input[type="submit"]:hover {
      background-color: #3E8E41;
    }
    }
  </style>
</head>
<body>
  <h1>Лабиринт</h1>
<form action="solve_maze.php" method="POST">
  <div class="form">
    <div class="form-group">
   
      <label for="maze"><pre>
Лабиринт
по типу: 
1, 0, 3, 2
2, 1, 0, 4
3, 2, 1, 5
0, 0, 0, 1
</pre> 
</label>
      <textarea id="maze" name="maze" rows="5" cols="30"></textarea>
    </div>
    <div class="form-group">
      <label for="start">Старт:</label>
      <input type="text" id="start" name="start" placeholder="x,y">
    </div>

    <div class="form-group">
      <label for="end">Конец:</label>
      <input type="text" id="end" name="end" placeholder="x,y">
    </div>

    <div class="form-group">
      <input type="submit" value="Поехали">
    </div>
  </div>
</form>
</body>
</html>