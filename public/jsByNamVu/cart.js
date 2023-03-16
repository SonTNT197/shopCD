window.onload=()=>{
    var add=document.querySelectorAll('#btn2');
    var sub=document.querySelectorAll('#btn1');
    var quan=document.querySelectorAll('#quan');
    var price=document.querySelectorAll('#price')
    var inp=document.querySelectorAll('#inp');
    var total=document.querySelectorAll('#total');
    var checkout = document.getElementById('btn-checkout');
    var cost=document.getElementById('cost');
    var step2=document.getElementById('step2cart');
    var bg2=document.getElementById('bgstep2');
    var valaddress=document.getElementById('valaddress');
    var notify=document.getElementById('notify');
    var confirmbtn=document.getElementById('confirmbtn');
    var formcart=document.getElementById('formcart');
    //button click add or none
    for (let i = 0; i < add.length; i++) {
        add[i].addEventListener('click',function(){

            quan[i].innerHTML=Number(quan[i].innerHTML)+1;
            total[i].innerHTML=Number(price[i].innerHTML*quan[i].innerHTML);
            costt(total);
            inp[i].value=quan[i].innerHTML;

        })
        sub[i].addEventListener('click',function(){
            quan[i].innerHTML>1 ? quan[i].innerHTML-=1 : false;
            total[i].innerHTML=Number(price[i].innerHTML*quan[i].innerHTML);
            costt(total);
            inp[i].value=quan[i].innerHTML;

        })
    }
    //total
    for (let i = 0; i < total.length; i++) {
        total[i].innerHTML=Number(price[i].innerHTML*quan[i].innerHTML);
    }
    costt(total);
    //click on checkout
    
    checkout.addEventListener('click',function(){
        if(inp.length>0){
            step2.style.display='block';
            bg2.style.display='block';
        }
    })
    
    bg2.addEventListener('click',function(){
        step2.style.display='none';
        bg2.style.display='none';
    })
    addEventListener('keyup',function(e){
        if (e.key=='Escape') {
            step2.style.display='none';
            bg2.style.display='none';
        }
    })
    //confirm button
    confirmbtn.addEventListener('click',function(){
        if (valaddress.value.length==0) {
            //validate value address
            notify.innerText='Type your address';
            return false;
        }
        formcart.submit()
    })
    
    
    
    
    


}

costt=(total)=>{

    cost.innerHTML=0;
    for (let j = 0; j < total.length; j++) {

        cost.innerHTML=Number(cost.innerHTML)+Number(total[j].innerHTML)
    }
    return true;
}
