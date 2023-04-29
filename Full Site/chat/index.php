<?php require('../config/db.php');
session_start();
$user_id= $_SESSION['username'];

$id = mysqli_real_escape_string($conn, $_GET['id']);
$query = 'SELECT * FROM messages WHERE to_id='.$id;
$result = mysqli_query($conn, $query);
$messages = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Chat App</title>
  <link rel="stylesheet" type="text/css" href="styles.css">

  <style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }
      
      .chatbox {
        border: 1px solid #ccc;
        width: 400px;
        height: 500px;
        display: flex;
        flex-direction: column;
        padding: 20px;
        border-radius: 5px;
      }
      
      .messages {
        flex-grow: 1;
        overflow-y: auto;
      }
      
      .message {
        background-color: #f2f2f2;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
      }
      
      .input-area {
        display: flex;
        margin-top: 10px;
      }
      
      input[type="text"] {
        flex-grow: 1;
        padding: 5px;
        border-radius: 3px;
        border: 1px solid #ccc;
        margin-right: 5px;
      }
      
      button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 3px;
        cursor: pointer;
      }
      
  </style>
</head>
<body>
  <div class="container">
    <div class="chatbox">
      <div class="messages">
        <div class="message">Hello, how are you?</div>
        <div class="message">I'm great, thanks for asking!</div>
      </div>
      <div class="input-area">
        <input type="text" placeholder="Type your message...">
        <button>Send</button>
      </div>
    </div>
  </div>
</body>
</html>
