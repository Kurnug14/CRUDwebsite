document.getElementById("table").addEventListener("change", tableSetter)
window.addEventListener("load", selectSetter)
var table = "workout"

function tableSetter(){
    table = document.getElementById("table").value
    console.log(table)
    document.getElementById("ctable").value = table
    document.getElementById("rtable").value = table
    document.getElementById("utable").value = table
    document.getElementById("dtable").value = table
    localStorage.setItem('selector', table)
}

function selectSetter(){
  let keeper = localStorage.getItem('selector');
  table = document.getElementById("table").value = keeper
  document.getElementById("ctable").value = keeper
  document.getElementById("rtable").value = keeper
  document.getElementById("utable").value = keeper
  document.getElementById("dtable").value = keeper
}