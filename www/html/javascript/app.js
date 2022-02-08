function ajaxannouce() {
    const ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function () {
        if (ajax.readyState === 4 ) {
            console.log(this.responseText);
            document.getElementById("remoteannouce").innerHTML = this.responseText;
        }
    }
    ajax.open("GET", "https://raw.githubusercontent.com/onazu/dev-site/master/www/html/annonce/annouce.txt", true);
    ajax.send();
}

function ajaxinsert(item) {
    const ajax = new XMLHttpRequest();
    let jsonString = JSON.stringify(item)
    ajax.responseType ='json'
    ajax.onreadystatechange = function () {
        console.log(this);
        if (ajax.readyState === 4 ) {
            console.log(this.response.bureau)
            // set graphical env
            document.getElementById("remplacement").innerHTML = this.response.emplacement;
            document.getElementById("rbureau").innerHTML = this.response.bureau;
            document.getElementById("rprise").innerHTML = this.response.prise;
            // update var
            user_data = this.response;
        }
    }
    ajax.open("POST", "insert.php", true);
    ajax.setRequestHeader('Content-Type', "application/json");
    ajax.send(jsonString);
    console.log(jsonString);
}
function ajaxteam(item) {
    const ajax = new XMLHttpRequest();
    let jsonString = JSON.stringify(item)
    ajax.responseType ='json'
    ajax.onreadystatechange = function () {
        console.log(this);
        if (ajax.readyState === 4) {
            // set graphical env
            let HTML = "<table><tr>";
            HTML += "<th>Nom</th>";
            HTML += "<th>Emplacement</th>";
            HTML += "<th>N°prise</th>";
            HTML += "<th>@IP</th>";
            HTML += "<th>À jour</th>";
            HTML += "<th>Tracée</th>";
            HTML += "</tr></thead>";
            HTML += "<tbody>";
            for (let i=0; i<this.response.length; i++){
                HTML += "<tr>";
                HTML += "<td>"+this.response[i].user_name+"</td>";
                HTML += "<td>"+this.response[i].emplacement+"</td>";
                HTML += "<td>"+this.response[i].prise+"</td>";
                HTML += "<td>"+this.response[i].ip+"</td>";
                if (this.response[i].maj === "0")  {
                    HTML += "<td><div class='red text-center' style='margin: 0 auto'>X</div></td>";
                }else{
                    HTML += "<td><div class='green text-center' style='margin: 0 auto'>V</div></td>";
                }
                if (this.response[i].log === "0")  {
                    HTML += "<td><div class='red text-center' style='margin: 0 auto'>X</div></td>";
                }else{
                    HTML += "<td><div class='green text-center' style='margin: 0 auto'>V</div></td>";
                }
                HTML += "</tr>";
            }
            HTML += "</tr></tbody>";
            document.getElementById("tableteam").innerHTML = HTML;
            // update var
            user_team = this.response;
        }
    }
    ajax.open("POST", "team.php", true);
    ajax.setRequestHeader('Content-Type', "application/json");
    ajax.send(jsonString);
    console.log(jsonString);
}

function logout() {
    window.location.href='logout.php';
}
function getmodif() {
    document.getElementById("getbureau").style.display= "inline-block";
    document.getElementById("bureau").style.display= "none";
    document.getElementById("getemplacement").style.display= "inline-block";
    document.getElementById("emplacement").style.display= "none";
    document.getElementById("getprise").style.display= "inline-block";
    document.getElementById("prise").style.display= "none";
    document.getElementById("bvalide").style.display= "block";
    document.getElementById("bmodif").style.display= "none";
}
function setmodif() {
    let b = document.getElementById("bselect").value;
    let e = document.getElementById("eselect").value+"-"+document.getElementById("ebselect").value;
    let p = document.getElementById("pinput").value;
    let item = {bureau: b, emplacement: e, prise: p, user_name: user_data['user_name']};
    ajaxinsert(item);
    console.log(user_data)
    document.getElementById("getbureau").style.display= "none";
    document.getElementById("bureau").style.display= "inline-block";
    document.getElementById("getemplacement").style.display= "none";
    document.getElementById("emplacement").style.display= "inline-block";
    document.getElementById("getprise").style.display= "none";
    document.getElementById("prise").style.display= "inline-block";
    document.getElementById("bvalide").style.display= "none";
    document.getElementById("bmodif").style.display= "block";
}
function myengine() {
    document.getElementById("teaminfo").style.display= "none";
    document.getElementById("announce").style.display= "none";
    document.getElementById("releasenote").style.display= "none";
    document.getElementById("userinfo").style.display= "block";
    document.getElementById("systeminfo").style.display= "block";
    document.getElementById("state").style.display= "block";
    if (user_data["log"] === "0")  {
        document.getElementById("log").innerHTML = "<div class='red'>X</div>";
    }else{
        document.getElementById("log").innerHTML = "<div class='green'>V</div>";
    }
    if (user_data["maj"] === "0")  {
        document.getElementById("uptodate").innerHTML = "<div class='red'>X</div>";
    }else{
        document.getElementById("uptodate").innerHTML = "<div class='green'>V</div>";
    }
}

function teamengine() {
    if (user_data["bureau"] === "A definir B" ) {
        alert("bureau à definir");
    } else {
        document.getElementById("teaminfo").style.display = "block";
        document.getElementById("announce").style.display = "none";
        document.getElementById("releasenote").style.display = "none";
        document.getElementById("userinfo").style.display = "none";
        document.getElementById("systeminfo").style.display = "none";
        document.getElementById("state").style.display = "none";
        let item = {bureau: user_data["bureau"]}
        ajaxteam(item);
    }
}

function home() {
    document.getElementById("teaminfo").style.display= "none";
    document.getElementById("announce").style.display= "block";
    document.getElementById("releasenote").style.display= "block";
    document.getElementById("userinfo").style.display= "none";
    document.getElementById("systeminfo").style.display= "none";
    document.getElementById("state").style.display= "none";
}

function getdesk() {
    let e = document.getElementById("eselect").value;
    document.getElementById("ebselect").innerHTML = "";
    console.log(e);
    if (e === "M-02-2") {
        let HTML = "<optgroup label='N°BUREAU'>";
        for (let i=201; i<227; i++){
            HTML += "<option value="+i+">"+i+"</option>";
        }
        HTML += "</optgroup>";
        document.getElementById("ebselect").innerHTML = HTML;
    } else if (e === "M-02-3") {
        let HTML = "<optgroup label='N°BUREAU'>";
        for (let i=301; i<327; i++){
            HTML += "<option value="+i+">"+i+"</option>";
        }
        HTML += "</optgroup>";
        document.getElementById("ebselect").innerHTML = HTML;
    } else if (e === "M-02-4") {
        let HTML = "<optgroup label='N°BUREAU'>";
        for (let i=401; i<426; i++){
            HTML += "<option value="+i+">"+i+"</option>";
        }
        HTML += "</optgroup>";
        document.getElementById("ebselect").innerHTML = HTML;
    }
}

function update() {
    window.location.href="https://raw.githubusercontent.com/onazu/dev-site/master/www/html/annonce/annouce.txt";
}

ajaxannouce();