let table;
let tableContainer=document.getElementById('tableContainer')

function searchItem(){
    var ajax = new XMLHttpRequest();
    var params= new FormData();
    alert(document.getElementById("search").value)
    params.append("search", document.getElementById("search").value);
    ajax.open("POST", 'http://localhost/dashboard/getItems.php', true);
    ajax.send(params);
    ajax.onload = function() {
        if (ajax.status == 200) {
            if(ajax.responseText=="No items were found" || ajax.responseText=="Server Error"){
                alert(ajax.responseText)
                return false
            }
            var jsonObj=JSON.parse(ajax.responseText);
            for(item in jsonObj)
                console.log(jsonObj[item])
            initSearchTable(jsonObj)
            return true;
        }
    }
    ajax.onerror=function() {
        alert("Server Error")
    }
}

function initSearchTable(items) {
    let table=document.getElementById('table')
    let tableContainer=document.getElementById('tableContainer')
    if(table)
        tableContainer.removeChild(table)
    if(!items.length){
        alert("No Items were found")
        return
    }
    table=tableContainer.appendChild(document.createElement('table'))
    table.id="table"
    table.className="w3-table-all"
    var topRow=table.appendChild(document.createElement('tr'))
    topRow.className="w3-green"
    let headings=["Product ID", "Product Name", "Product Quantity"]
    for(let i=0 ; i<3 ; i++){
        let th=topRow.appendChild(document.createElement('th'))
        th.innerHTML=headings[i]
    }
    for(item in items)
        addRow(items[item])
}

function addRow(data){
    let table=document.getElementById('table')
    let tr=table.appendChild(document.createElement('tr'))
    for(let i=0 ; i<3 ; i++){
        let td=tr.appendChild(document.createElement('td'))
        td.innerHTML=data[i]
    }
}