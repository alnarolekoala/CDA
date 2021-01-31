document.getElementById('suivant').onclick = function() {
    document.getElementById('page2').setAttribute("class", "page1")
    document.getElementById('page1').setAttribute("class", "page3")

}



document.getElementById('suivant2').onclick = function() {
    document.getElementById('page1').setAttribute("class", "page1")
    document.getElementById('page2').setAttribute("class", "page3")
}


document.getElementById('start').onclick = function() {
    document.getElementById('page1').setAttribute("class", "page1")
    document.getElementById('start').setAttribute("class", "page3")
    document.getElementById('suivant').setAttribute("class", "")
}





