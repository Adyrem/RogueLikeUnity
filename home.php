<script>

    var arr = ["Marc", "Flavio", "Adrian", " Samuel"];
    function showname(){
        document.getElementById("show").innerText = arr[Math.random()*arr.length|0];
        document.getElementById("confirm").style.display = "flex";
    }

    function mdown() {
        document.getElementById("btn").style.boxShadow = "0px 0px darkred";
        document.getElementById("btn").style.marginBottom = "0px";
        document.getElementById("btn").style.marginTop = "10px";
    }

    function mup(){
        document.getElementById("btn").style.boxShadow = "0px 10px darkred";
        document.getElementById("btn").style.marginBottom = "10px";
        document.getElementById("btn").style.marginTop = "0px";
    }

    function burger() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>

<br style="height: 20px;">
<div class="content">
    <button id="btn" onclick="showname()" onmousedown="mdown()" onmouseup="mup()"></button>
    <p id="show"></p>
    <a id="confirm" style="display: none">
        <button>OK</button>
        <button>Cancel</button>
</div>