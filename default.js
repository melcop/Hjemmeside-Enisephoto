function loadTopics(){
    
    var formName = 'get_topic';
    var category = document[formName]['category'].value;
    
    var xmlhttp = null;
    if(typeof XMLHttpRequest != 'udefined'){
        xmlhttp = new XMLHttpRequest();
    }else if(typeof ActiveXObject != 'undefined'){
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }else 
        throw new Error('You browser doesn\'t support ajax');
        
    xmlhttp.open('GET', 'load_topics.php?category='+category, true);
    xmlhttp.onreadystatechange = function (){
        if(xmlhttp.readyState == 4)
            window.insertStates(xmlhttp);
    };
    xmlhttp.send(null);
}

function insertTopics(xhr){
    if(xhr.status == 200){
        document.getElementById('topics_container').innerHTML = xhr.responseText;
    }else 
        throw new Error('Server has encountered an error\n'+
                         'Error code = '+xhr.status);
}
