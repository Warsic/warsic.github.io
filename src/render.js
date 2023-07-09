function load(path) {
    let Http = new XMLHttpRequest();
    Http.open("GET", path);
    Http.send();

    Http.onreadystatechange = () => {
        if(Http.readyState == 4 && Http.status == 200) {
            document.getElementById('render-markdown').innerHTML = Http.responseText;
        }
        else {
            document.getElementById('render-markdown').innerHTML
                = "HTTP GET ERROR<br>State: " + Http.readyState + "<br>Status: " + Http.status + "<br>" + Http.responseText;
        }
    };
}

function render(data) {

}

load(mdPath);