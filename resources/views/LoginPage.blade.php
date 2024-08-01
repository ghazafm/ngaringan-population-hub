<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Animated Login Page with Logo</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body, html {
      height: 100%;
      font-family: Arial, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .background {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(45deg, #2e2c2c, #c5871d, #e8f6b1, #f3f5f3);
      background-size: 400% 400%;
      animation: gradient 15s ease infinite;
      z-index: -1;
    }

    @keyframes gradient {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
      z-index: 1;
    }

    .login-box {
      background: rgba(255, 255, 255, 0.1);
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
      backdrop-filter: blur(10px);
      text-align: center;
      color: white;
      width: 300px;
      position: relative;
      overflow: hidden;
    }

    .login-box h2 {
      margin-bottom: 20px;
      font-size: 24px;
      letter-spacing: 1px;
    }

    .login-box img {
      width: 100px;
      margin-bottom: 20px;
    }

    .input-box {
      position: relative;
      margin-bottom: 30px;
    }

    .input-box input {
      width: 100%;
      padding: 10px 0;
      background: none;
      border: none;
      border-bottom: 1px solid white;
      outline: none;
      color: white;
      font-size: 18px;
      letter-spacing: 1px;
    }

    .input-box label {
      position: absolute;
      top: 0;
      left: 0;
      pointer-events: none;
      transition: 0.5s;
      color: rgba(255, 255, 255, 0.5);
    }

    .input-box input:focus ~ label,
    .input-box input:valid ~ label {
      top: -20px;
      left: 0;
      color: #03a9f4;
      font-size: 14px;
    }

    button {
      background: #03a9f4;
      border: none;
      outline: none;
      padding: 10px 20px;
      color: white;
      font-size: 18px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background: #0288d1;
    }
  </style>
</head>
<body>
  <div class="background"></div>
  <div class="container">
    <div class="login-box">
      <img src="{{asset('images/logo_only.png')}}" alt="Logo">
      <h2>Login</h2>
      <form>
        <div class="input-box">
          <input type="text" required>
          <label>Username</label>
        </div>
        <div class="input-box">
          <input type="password" required>
          <label>Password</label>
        </div>
        <button type="submit">Login</button>
      </form>
    </div>
  </div>
</body>
</html>
