searchclick=()=>{
    var search=document.getElementById('search');
    var disable=document.getElementById('layoutdisable');
    var searchdis=document.getElementById('searchdisplay');
    var disbody = document.getElementsByTagName("BODY")[0];
    var searchin=document.getElementById('searchin');
    
    disbody.style='overflow: hidden;';
    disable.style='opacity:1;visibility: visible';
    searchdis.style='top:50%;';
    setTimeout(() => {
        searchin.focus();
    }, 500);
    disable.addEventListener('click',function(){
        
        searchdis.style='top:-70%;'
        disable.style='opacity:0;visibility: hidden';
        disbody.style='overflow: auto;';
        
    })
     //ajax area

     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.search').on('keydown',function(e){
        if (e.key=='Escape') {
            e.preventDefault();
            $('.search').blur();
            searchdis.style='top:-70%;'
            disable.style='opacity:0;visibility: hidden';
            disbody.style='overflow: auto;';
        }
    })
    $(document).ready(function () {
        $('.search').on('keyup',function(e){
            
            searchinput=$('.search').val()
            setTimeout(() => {
                
                $.ajax({
                    type: "get",
                    url: "/search",
                    data: {'search':searchinput},
                    beforeSend: function(){
                        var out="<div class='loading'><img src='/storage/imgNV/loading.gif'></div> "
                        $('.datasearch').html(out); 
                    },
                    success: function (data) {
                         console.log(data);
                        
                        $('.datasearch').html(data); 
                    }
                });
            }, 500);
            // settimeout fix loi search lien tuc lam nhap nhay
            
        })
    });



}