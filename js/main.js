function headers(){
    document.getElementById('images').style.display="block";
    document.getElementById('event').style.display="none";
    document.getElementById('feedback').style.display="none";
    document.getElementById('users').style.display="none";
    document.getElementById('gallery').style.display="none";
}

function events(){
    document.getElementById('event').style.display="block";
    document.getElementById('images').style.display="none";
    document.getElementById('feedback').style.display="none";
       document.getElementById('users').style.display="none";
     document.getElementById('gallery').style.display="none";
    }
    function feedback(){
    document.getElementById('feedback').style.display = "block";
    document.getElementById('event').style.display="none";
    document.getElementById('users').style.display="none";
    document.getElementById('images').style.display="none";
    document.getElementById('gallery').style.display="none";
    }
    function users(){
        document.getElementById('users').style.display="block";
        document.getElementById('feedback').style.display = "none";
        document.getElementById('event').style.display="none";
        document.getElementById('images').style.display="none";
        document.getElementById('gallery').style.display="none";
    }

    
    function addCoverpage() {
        var coverpage = document.getElementById('cover_page').click();
    }
    function displayCoverpage(e) {
       
        if (e.files[0]) {
            var reader = new FileReader();
           
            reader.onload = function (e) {
                document.querySelector("#coverpage-placeholder").setAttribute('src', e.target.result);
                
            }
            reader.readAsDataURL(e.files[0]);
            
        }
    }