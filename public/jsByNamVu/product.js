window.onload=()=>{
    var child=document.querySelectorAll('#childimg');
    var main=document.getElementById('mainimg');
    var checklogin=document.getElementById('checklogin');
    checkstarcmt();
    barcmt();
    statuscard();
    for (let i = 0; i < child.length; i++) {
        child[i].addEventListener('click',function(){
            for (let j = 0; j < child.length; j++) {
                child[j].classList.remove('actimg');
            }
            child[i].classList.add('actimg')
            main.innerHTML=child[i].innerHTML;
        })
        
    }
    
    // ajax area
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        $('#btn').on('click',function(){
            if (checklogin.value==1) {
                window.location.href='http://127.0.0.1:8000/login';
                return false;
            }
            var prod=$('#prod');
            var userid=$('#userid');
            var idvalue=userid.val();
            var prodvalue=prod.val();
            var dissc=document.getElementById('display');
            var carta=document.getElementById('carta');
            carta.style='display:block';
            dissc.style='opacity:1;visibility: visible';
            $('#cover').fadeIn(100);
            window.setTimeout(function(){
                $('#cover').fadeOut(100);
                dissc.style='opacity:0;visibility: hidden';
            },1000)
            
            
            $.ajax({
                type: "get",
                url: "/shop/product/"+prodvalue,
                data: {'prod':prodvalue,'userid':idvalue},
                // beforeSend: function(){
                //     setTimeout(function(){
                //         $('#nbrcart').html('//cho gif loading zo')
                //     },2000)
                // },
                success: function (data) {
                     console.log(data);
                     $('#nbrcart').html(data);
                     $('#nbrcart2').html(data);
                }
            });
            
        })
    });

    //comment js area
    var cusinp=document.getElementById('cusinp');
    var postbtn=document.getElementById('postbtn');
    var vote=document.querySelectorAll('#starvote');
    var checkvote=0;
    var votevalue=document.getElementById('votevalue');
        //star
        
    for (let i = 0; i < vote.length; i++) {
        //hover 
    
        vote[i].addEventListener('mouseover',function(){
            if (checkvote==0) {
                removeallstar(vote);
                for (let j = 0; j < i+1; j++) {
                    vote[j].classList.remove('fa-regular')
                    vote[j].classList.add('fa-solid')
                    textvote(j);
                }
            }
            
        })
        vote[i].addEventListener('mouseout',function(){
            if (checkvote==0) {
                textvote(5);
                removeallstar(vote);
            }  
        })   
        
        
        //click
        vote[i].addEventListener('click',function(){
            removeallstar(vote);
            checkvote=1;
            for (let j = 0; j < i+1; j++) {
                vote[j].classList.remove('fa-regular');
                vote[j].classList.add('fa-solid');
                textvote(j);      
            }
            votevalue.value=Number(i+1);
            countcmt=cusinp.value.length;
            if (countcmt>30) {
                postbtn.style='width: 90%;visibility:visible'
                postbtn.innerHTML='POST'
            }
        })
    }



    cusinp.addEventListener('keyup',function(){
        countcmt=cusinp.value.length;
        if (countcmt>30 && checkvote==1) {
            
            postbtn.style='width: 90%;visibility:visible'
            postbtn.innerHTML='POST'
        }
        else if(countcmt<30){
            postbtn.innerHTML=''
            postbtn.style='width: 0;visibility:hidden;'
            
        }
    })

}

/// function
removeallstar=(vote)=>{
    for (let i = 0; i < vote.length; i++) {
        vote[i].classList.remove('fa-solid')
        vote[i].classList.add('fa-regular')
    }
}
textvote=(j)=>{
    let content=document.getElementById('textvote');
    switch (j) {
        case 0:
            content.innerHTML='I hate it &#128553';
            break;
        case 1:
            content.innerHTML="I don't like it &#128530";
            break;

        case 2:
            content.innerHTML="Not bad &#128529";
            break;
        case 3:
            content.innerHTML="It is good &#128536";
            break;
        case 4:
            content.innerHTML="I luv'it	&#128525";
            break;
        case 5:
            content.innerHTML='';
            break;
    }
    
}

checkstarcmt=()=>{
    var star=document.querySelectorAll('#starcmt');
    var starinp=document.querySelectorAll('#starinp');
    
    for (let i = 0; i < star.length; i++) {
       for (let j = 0; j < starinp[i].value; j++) {
            star[i].innerHTML+="<i class='fa-solid fa-star'></i>";
            
       }
       for (let j = 0; j < 5-starinp[i].value; j++) {
            star[i].innerHTML+="<i class='fa-regular fa-star'></i>";
        }
        
    }
}
barcmt=()=>{
    var barvalue=document.querySelectorAll('#barvalue');
    var barfill=document.querySelectorAll('#barfill');
    var bartot=document.getElementById('bartot');
    for (let i = 0; i < barvalue.length; i++) {
        let widthbar=(barvalue[i].innerText)*100/(bartot.innerText);
        
        barfill[i].style=`width:${widthbar}%`;
    }
}
statuscard=()=>{
    var statusshow=document.querySelectorAll('#status');
    var counttot=document.getElementById('counttot');
    var sumre=document.getElementById('sumre');
    console.log(sumre);
    if (sumre.innerHTML>4 && counttot.innerHTML>9) {
        for (let i = 0; i < statusshow.length; i++) {
            statusshow[i].innerHTML='Highly rated';
            statusshow[i].classList.add('highrate');
        }
    }
    else if(sumre.innerHTML<2 && sumre.innerHTML>0){
        console.log('vao bad')
        for (let i = 0; i < statusshow.length; i++) {
            statusshow[i].innerHTML='Low rated';
            statusshow[i].classList.add('lowrate');
        }
    }
    else{
        console.log('vao sug')
        for (let i = 0; i < statusshow.length; i++) {
            statusshow[i].innerHTML='Suggest';
            statusshow[i].classList.add('suggest');
        }
    }
}
