function enlargeImage(){
    var smallimage = document.getElementById("small");
    var bigimage = document.getElementById("big");
    small.setAttribute("style", "display: none;");
    big.setAttribute("style", "display: flex;");
}
function ensmallImage(){
    var smallimage = document.getElementById("small");
    var bigimage = document.getElementById("big");
    small.setAttribute("style", "display: flex;");
    big.setAttribute("style", "display: none;");
}