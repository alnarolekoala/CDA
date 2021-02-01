document.getElementById('sendmail').onclick = function() {
    document.getElementById('frame').removeAttribute("class", "cache")
}

document.getElementById('close').onclick = function() { 
    document.getElementById('frame').setAttribute("class", "cache")
 
    }
