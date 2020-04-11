$(document).ready(function(){
    var current = $("#current");
    var find = $("#find");
    var findInput = $("input[id=findCountry]");
    var findBtn = $("button[id=findBtn]");
    
    //on input
    findBtn.on("click", function(){
        var val = findInput.val();
        if(val == ""){
            find.hide(1000);
            current.show(1000);
        }
        else{
            current.hide(1000);
            find.slideDown(1000);
            find.html("<div class='container d-flex justify-content-center'><div class='spinner-grow text-danger' style='width: 3rem; height: 3rem;' role='status'><span class='sr-only text-center'>Loading...</span></div></div>");
            //ajax
            $.ajax({
                type: "GET",
                url: "../corona-lokerqu.php",
                data: {},
                dataType: "json",
                success: function(response){
                    var expression = new RegExp(val, "i");
                    find.html("");
                    $.each(response, function(key, value){
                        var attr = value["attributes"];
                        var country = attr["Country_Region"];
                        if (country.search(expression) != -1)
                        {
                            var attrs = value["attributes"];
                            var country = attrs["Country_Region"];
                            var active = attrs["Active"];
                            var confirmed = attrs["Confirmed"];
                            var deaths = attrs["Deaths"];
                            var recovered = attrs["Recovered"];              
                            //append         
                            find.append("<div class='col-sm-4 mb-2'><div class='card round'><div class='secondary-bg p-2'><p class='text-light lead m-0'>"+country+"</p></div><div class='card-body'><table class='table'><tbody><tr><th>Confirmed</td><td>"+confirmed+"</td></tr><tr><th>Meninggal</td><td>"+deaths+"</td></tr><tr><th>Positif</td><td>"+active+"</td></tr><tr><th>Sembuh</td><td>"+recovered+"</td></tr></tbody></table></div></div></div>");    
                        }
                    });
                    if(find.html() == ""){
                        find.html("<div class='container d-flex justify-content-center'><div class='text-danger'><p class='lead text-center text-danger'>Sorry, We can't find country with query <b>"+val+"</b></p></div></div>");
                    } 
                }
            });
        }
    });
});