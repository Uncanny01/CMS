function hideText()
{
    var x = document.getElementById("search");
    x.value = "";
}

function showbt()
{
    var x = document.getElementById("search").value;
    var y = document.getElementById("x");
    if((x.length)>0)
    {
        y.style.display = "inline-block";
    }
    else
    {
        y.style.display = "none";
    }
}
setInterval(showbt, 100);