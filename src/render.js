function load(path, callback, errorHandler) {
    let Http = new XMLHttpRequest();
    Http.open("GET", path);
    Http.send();

    Http.onreadystatechange = () => {
        if(Http.readyState == 4 && Http.status == 200) {
            callback(Http.responseText);
        }
        else {
            errorHandler("HTTP GET ERROR<br>State: " + Http.readyState + "<br>Status: " + Http.status + "<br>" + Http.responseText);
            
        }
    };
}

function render(data) {
    document.getElementById('render-markdown').innerHTML = data;
}

function showError(mes) {
    document.getElementById('render-markdown').innerHTML = mes;
}

load(mdPath, render, showError);