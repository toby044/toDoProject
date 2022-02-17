<?php
header("Content-type: text/css; charset: UTF-8");

$grey = '#5b5b5b';
$white = '#ffffff';
$bg_aside = '#84CADA';
$bg_main = '#5495A4';
?>

@import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

body, html {
margin: 0;
padding: 0;
height:100%;
}

* {
box-sizing:border-box;
font-family: 'Roboto', sans-serif;
list-style-type: none;
text-decoration: none;
}

p {
color: <?php echo $grey; ?>;
}

a, h2 {
color: <?php echo $white; ?>;
}

a {
font-size: 1em;
padding-top: 5%;
font-weight: normal;
}

a:active {
font-weight: bold;
font-size:1.1em;
}

h2 {
font-size: 2.3em;
margin: 0;
}

.logoutBtn {
  font-weight: 600;
}

aside {
width: 20%;
height:100%;
background-color: <?php echo $bg_aside; ?>;
margin:0;
padding:5% 5% 5% 3.5%;
display:flex;
justify-content: space-between;
flex-direction: column;
}

.flex-down {
display:flex;
flex-direction: column;
}

main {
  background-color: <?php echo $bg_main; ?>;
  width:80%;
  display: flex;
  justify-content: center;
  align-items: center;
}

body {
  display:flex;
}

.main-container {
  max-width: 80%;
  background-color: <?php echo $white; ?>;
  border-radius: 10px;
  padding: 2rem;
}

/** To Do styling */
.todo-section {

}

.todo-item {
  display: flex;
  align-items: center;
  gap: 5rem;
}
.todo-header {
  color: <?php echo $grey; ?>;
}

.wrapper {
  display: flex;
  align-items: center;
  gap: 2rem;
}

.todo-checkbox-container {
  display: block;
  position: relative;
  padding-left: 35px;
  cursor: pointer;
  font-size: 21px;
  user-select: none;
}
.todo-checkbox-container input {
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

.todo-checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 8px;
  border: 2px solid <?php echo $grey; ?>;
}

.todo-checkbox-container:hover input ~ .todo-checkmark {
  border: 2px solid black;
}

.todo-checkbox-container input:checked ~ .todo-checkmark {
  background-color: #eee;
}

.todo-checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

.todo-checkbox-container input:checked ~ .todo-checkmark:after {
  display: block;
}

.todo-checkbox-container .todo-checkmark:after {
  left: 7px;
  top: 3px;
  width: 5px;
  height: 10px;
  border: solid <?php echo $grey; ?>;
  border-width: 0 3px 3px 0;
  transform: rotate(45deg);
}