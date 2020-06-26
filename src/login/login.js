async function onSubmitForm(event) {
    var ajax = new XMLHttpRequest();
    var params= new FormData();
    alert(document.getElementById("email").value)
    params.append("email", document.getElementById("email").value);
    params.append("password", document.getElementById("password").value);
    ajax.open("POST", 'http://127.0.0.1:5000/checkCredentials', false);
    ajax.send(params);
    ajax.onload = function() {
        if (ajax.status == 200) {
            var jsonObj=JSON.parse(ajax.responseText);
            alert('json obj ', jsonObj, ajax.responseText, json.response)
            if(!jsonObj.result){
                alert("Invalid Email or Password");
                return false
            }
            return false;
        }
    }
    ajax.onerror=function() {return false}
    return false
}