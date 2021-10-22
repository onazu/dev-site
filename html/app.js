function logout(){
    window.location.href='logout.php'
}

function myengine(){
    document.getElementById("teaminfo").style.display= "none";
    document.getElementById("announce").style.display= "none";
    document.getElementById("releasenote").style.display= "none";
    document.getElementById("userinfo").style.display= "block";
    document.getElementById("systeminfo").style.display= "block";
    document.getElementById("state").style.display= "block";
}

function teamengine(){
    document.getElementById("teaminfo").style.display= "block";
    document.getElementById("announce").style.display= "none";
    document.getElementById("releasenote").style.display= "none";
    document.getElementById("userinfo").style.display= "none";
    document.getElementById("systeminfo").style.display= "none";
    document.getElementById("state").style.display= "none";
}

function home(){
    document.getElementById("teaminfo").style.display= "none";
    document.getElementById("announce").style.display= "block";
    document.getElementById("releasenote").style.display= "block";
    document.getElementById("userinfo").style.display= "none";
    document.getElementById("systeminfo").style.display= "none";
    document.getElementById("state").style.display= "none";
}