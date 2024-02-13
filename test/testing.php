<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

body {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    height: 100vh;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.form-container {
    display: flex;
    gap: 10px;
    background-color: #f0f0f0;
    padding: 20px;
    border-radius: 8px;
}

* {
  box-sizing: border-box;
}

/* Create three unequal columns that floats next to each other */
.column {
  float: left;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

.middle {
  width: 100%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

h1, h2, h3, h4, h5 {
  font-family: Verdana;
  margin: 2px;  
  text-align: center;
  padding: 5px;
}

.number-size-h1 {
    font-size: 150px;
}

.number-size-h1-sc {
    font-size: 100px;
}

.number-size-h2 {
    font-size: 100px;
}

.h3-margin {
    margin-bottom: 20px;
}

.logout-button {
  text-align: right;
}

.btn-control {
    text-align: center;
}

.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 10px 14px;
  font-size: 10px;
  cursor: pointer;
  border-radius: 40px;
}

.btn:hover {
  background-color: RoyalBlue;
}

.img-position {
    display: block;
    margin: 20px auto 0;
    margin-bottom: 20px;
}
</style>
</head>
<body>

<img class="img-position" src="path/to/your/logo.png" alt="Logo">

<form class="form-container">
   
    <div class="row">
        <div class="column middle">
          <h4>Waiting Number</h4>
          <h4>Hi,</h4>
          <h5>Student Name</h5>
          <h5>Thank you for patiently waiting.</h5>
          <h2 class="number-size-h2">0</h2>
          <div class="btn-control">
            <button class="btn">Done</button>
          </div> 
        </div>
    </div>

</form>

</body>
</html>
