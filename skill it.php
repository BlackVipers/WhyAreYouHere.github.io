<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
  header("location: Login.php");
}
?>
<!doctype html>
<html>
  <head>
  <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>
          Skill it
      </title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  font-family: 'Poppins', sans-serif;
}
body, html {
  width: 100%;
  height: 100%;
  overflow: hidden;
  background: url(https://www.cainfotechindia.com/webdesign_blog/wp-content/uploads/2020/05/0.gif);
  background-size: cover;
}
.content{
  display:flex;
  position: absolute;
  top: 5px;
  left: 550px;
  width: 840px;
  height:100px;
}
.content .text{
  position: relative;
  color: rgb(255, 255, 255);
  font-weight: 700;
  background: none;
  font-size: 45px;
  transform: scale(2);
  padding: 30px;
  letter-spacing: 2px;
  text-transform: uppercase;
}
.content .text:before,
.content .text:after {
  padding: 30px;
  color: white;
  content: attr(data-text);
  position: absolute;
  width: 100%;
  height: 100%;
  overflow: hidden;
  top: 0;
}
.content .text:before{
  left: 3px;
  text-shadow: -2px 0 red;
  animation: glitch-1 2s linear infinite reverse;
}
.content .text:after{
  left: -3px;
  text-shadow: -2px 0 blue;
  animation: glitch-2 2s linear infinite reverse;
}
@keyframes glitch-1 {
  0% {
    clip: rect(132px, auto, 101px, 30px);
  }
  5% {
    clip: rect(17px, auto, 94px, 30px);
  }
  10% {
    clip: rect(40px, auto, 66px, 30px);
  }
  15% {
    clip: rect(87px, auto, 82px, 30px);
  }
  20% {
    clip: rect(137px, auto, 61px, 30px);
  }
  25% {
    clip: rect(34px, auto, 14px, 30px);
  }
  30% {
    clip: rect(133px, auto, 74px, 30px);
  }
  35% {
    clip: rect(76px, auto, 107px, 30px);
  }
  40% {
    clip: rect(59px, auto, 130px, 30px);
  }
  45% {
    clip: rect(29px, auto, 84px, 30px);
  }
  50% {
    clip: rect(22px, auto, 67px, 30px);
  }
  55% {
    clip: rect(67px, auto, 62px, 30px);
  }
  60% {
    clip: rect(10px, auto, 105px, 30px);
  }
  65% {
    clip: rect(78px, auto, 115px, 30px);
  }
  70% {
    clip: rect(105px, auto, 13px, 30px);
  }
  75% {
    clip: rect(15px, auto, 75px, 30px);
  }
  80% {
    clip: rect(66px, auto, 39px, 30px);
  }
  85% {
    clip: rect(133px, auto, 73px, 30px);
  }
  90% {
    clip: rect(36px, auto, 128px, 30px);
  }
  95% {
    clip: rect(68px, auto, 103px, 30px);
  }
  100% {
    clip: rect(14px, auto, 100px, 30px);
  }
}
@keyframes glitch-2 {
  0% {
    clip: rect(129px, auto, 36px, 30px);
  }
  5% {
    clip: rect(36px, auto, 4px, 30px);
  }
  10% {
    clip: rect(85px, auto, 66px, 30px);
  }
  15% {
    clip: rect(91px, auto, 91px, 30px);
  }
  20% {
    clip: rect(148px, auto, 138px, 30px);
  }
  25% {
    clip: rect(38px, auto, 122px, 30px);
  }
  30% {
    clip: rect(69px, auto, 54px, 30px);
  }
  35% {
    clip: rect(98px, auto, 71px, 30px);
  }
  40% {
    clip: rect(146px, auto, 34px, 30px);
  }
  45% {
    clip: rect(134px, auto, 43px, 30px);
  }
  50% {
    clip: rect(102px, auto, 80px, 30px);
  }
  55% {
    clip: rect(119px, auto, 44px, 30px);
  }
  60% {
    clip: rect(106px, auto, 99px, 30px);
  }
  65% {
    clip: rect(141px, auto, 74px, 30px);
  }
  70% {
    clip: rect(20px, auto, 78px, 30px);
  }
  75% {
    clip: rect(133px, auto, 79px, 30px);
  }
  80% {
    clip: rect(78px, auto, 52px, 30px);
  }
  85% {
    clip: rect(35px, auto, 39px, 30px);
  }
  90% {
    clip: rect(67px, auto, 70px, 30px);
  }
  95% {
    clip: rect(71px, auto, 103px, 30px);
  }
  100% {
    clip: rect(83px, auto, 40px, 30px);
  }
}</style>
<style>
  @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700");
* {
font-family: 'Open Sans', sans-serif;
box-sizing: border-box;
color: #333;
font-size: 100%;
line-height: 1.3;
}
body {
margin: 0;
 background-size: cover;
}
nav {
--duration: .5s;
--easing: ease-in-out;
position: relative;
width: 220px;
margin: 20px;
}
nav ol {
list-style-type: none;
margin: 0;
padding: 0;
}
nav li {
margin: -4px 0 0 0;
}
nav a {
display: block;
text-decoration: none;
background: rgb(0, 255, 13);
transform-origin: 0 0;
transition: transform var(--duration) var(--easing), color var(--duration) var(--easing);
transition-delay: var(--delay-out);
border-radius: 2px;
padding: 1em 1.52em;
}
nav a i{
  padding: 10px;
}
nav a:hover {
background: #efefef; 
}
nav .sub-menu a {
font-size: .9em;
color: #000000;
border-left: 2em solid rgb(255, 255, 255);
padding: .75em;
background: linear-gradient(to right, #dddddd 2px, #ffffff 2px);
}
nav .sub-menu a:hover {
background: linear-gradient(to right, #dddddd 2px, #efefef 2px);
}
nav header {
font-weight: 600;
display: block;
color: rgb(0, 225, 255);
background: rgba(48, 43, 43, 0.5);
transform-origin: 0 0;
transition: transform var(--duration) var(--easing), color var(--duration) var(--easing);
transition-delay: var(--delay-out);
border-radius: 4px;
padding: 1em 1.52em;
}
nav header span {
border: none;
background: transparent;
size: 10px;
color: red;
padding: 0;
cursor: pointer;
line-height: 1;
float: right;
}
nav footer button {
position: absolute;
top: 0;
left: 0;
border: none;
padding: calc(1em - 2px);
width: 100%;
transform-origin: 0 0;
transition: transform var(--duration) var(--easing);
transition-delay: calc(var(--duration) + (.1s * (var(--count) / 2)));
cursor: pointer;
outline: none;
background: white;
opacity: 0;
}
nav.closed a,
nav.closed header {
transform: translateY(calc(var(--top) * -1)) scaleY(0.1) scaleX(0.2);
transition-delay: var(--delay-in);
color: transparent;
}
nav.closed footer button {
transition-delay: 0s;
transform: scaleY(0.7) scaleX(0.2);
}
</style>
<style>
.logout a
{
    position: relative;
    top: 600px;
    left: 1095px;
    padding: 10px 30px;
    margin: 0 15px;
    color: red;
    background: black;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 20px;
    overflow: hidden;
    transition: 0.5s;
    -webkit-box-reflect: below 1px linear-gradient(transparent, #0003);
}
.login a:nth-child(1)
{
  filter: hue-rotate(115deg);
}
.login a:nth-child(3)
{
  filter: hue-rotate(270deg);
}
.logout a:hover
{
  background: yellow;
  color: #111;
  box-shadow: 0 0 50px yellow;
  transition-delay: 0.5s;
}
.logout a:before
{
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 10px;
  height: 10px;
  border-top: 4px solid yellow;
  border-left: 4px solid yellow;
  transition: 0.5s;
  transition-delay: 0.5s;
}
.logout a:hover:before
{
  width: 100%;
  height: 100%;
  transition-delay: 0s;
}
.logout a:after
{
  content: '';
  position: absolute;
  bottom: 0;
  right: 0;
  width: 10px;
  height: 10px;
  border-bottom: 4px solid yellow;
  border-right: 4px solid yellow;
  transition: 0.5s;
  transition-delay: 0.5s;
}
.logout a:hover:after
{
  width: 100%;
  height: 100%;
  transition-delay: 0s;
}
</style>
</head>
<body>
<h3><?php echo "Welcome " .$_SESSION['user']?>! You can now use this website</h3>
  <div class="logout">
    <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
  </div>
  <div class="content">
    <h2 class="text" data-text="Skill it">Skill it</h2>
</div>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <nav class="menu">
    <header>Menu <span>Skill It</span></header>
    <ol>
        <li class="menu-item"><a href="abot the creatorz.html"><i class="fas fa-user"></i>About us</a></li>
        <li class="menu-item"><a href="#0"><i class="fas fa-search"></i>Search</a></li>
        <li class="menu-item">
            <a href="#0">Online tests</a>
            <ol class="sub-menu">
                <li class="menu-item"><a href="#0"><i class="fab fa-html5"></i>HTML</a></li>
                <li class="menu-item"><a href="#0"><i class="fab fa-css3-alt"></i>CSS</a></li>
                <li class="menu-item"><a href="#0"><i class="fab fa-js"></i>Java script</a></li>
            </ol>
        </li>
        <li class="menu-item">
            <a href="lessson final .html"><i class="fas fa-book"></i>Lessons</a>
        </li>
        <li class="menu-item"><a href="Contact us.html"><i class="fas fa-envelope"></i>Contact us</a></li>
        <li class="menu-item"><a href="Code editor.html"><i class="fas fa-code"></i>Code-editor</a></li>
        <li class="menu-item"><a href="ratingfinal.html"><i class="fas fa-comments"></i>Rate Us</a></li>
        <li class="menu-item"><a href="#0"><i class="fas fa-comments"></i>Doubts</a></li>
    </ol>
    <footer><button aria-label="Toggle Menu">Toggle</button></footer>
</nav> 
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script>
    
   var $els = $('.menu a, .menu header');
var count = $els.length;
var grouplength = Math.ceil(count/3);
var groupNumber = 0;
var i = 1;
$('.menu').css('--count',count+'');
$els.each(function(j){
    if ( i > grouplength ) {
        groupNumber++;
        i=1;
    }
    $(this).attr('data-group',groupNumber);
    i++;
});

$('.menu footer button').on('click',function(e){
    e.preventDefault();
    $els.each(function(j){
        $(this).css('--top',$(this)[0].getBoundingClientRect().top + ($(this).attr('data-group') * -15) - 20);
        $(this).css('--delay-in',j*.1+'s');
        $(this).css('--delay-out',(count-j)*.1+'s');
    });
    $('.menu').toggleClass('closed');
    e.stopPropagation();
});

</script>
</style>
</body>
</html>