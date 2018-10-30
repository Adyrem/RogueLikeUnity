<script>

    var arr = ["Marc", "Flavio", "Adrian", " Samuel"];
    function showname(){
        document.getElementById("show").innerText = arr[Math.random()*arr.length|0];
        document.getElementById("confirm").style.display = "flex";
    }

    function mdown() {
        document.getElementById("bigBtn").style.boxShadow = "0px 0px darkred";
        document.getElementById("bigBtn").style.marginBottom = "0px";
        document.getElementById("bigBtn").style.marginTop = "10px";
    }

    function mup(){
        document.getElementById("bigBtn").style.boxShadow = "0px 10px darkred";
        document.getElementById("bigBtn").style.marginBottom = "10px";
        document.getElementById("bigBtn").style.marginTop = "0px";
    }

</script>

<br style="height: 20px;">
<div class="content">
    <button id="bigBtn" onclick="showname()" onmousedown="mdown()" onmouseup="mup()"></button>
    <p id="show"></p>
    <a id="confirm" style="display: none">
        <button>OK</button>
</div>