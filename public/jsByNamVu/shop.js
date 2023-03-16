window.onload=()=>{
    
    // muc nay de bo active trang tren cac chi muc
    for (let i = 0; i < select.length; i++) {
        select[i].classList.remove('active')
        
    }
    select[1].classList.add('active');
    checkstarcmt();
    
    

}
checkstarcmt=()=>{
    var star=document.querySelectorAll('#starspan');
    var starinp=document.querySelectorAll('#countstar');

    for (let i = 0; i < star.length; i++) {
        roundstar=Math.round(starinp[i].innerHTML);

       for (let j = 0; j < roundstar; j++) {
        
            star[i].innerHTML+="<i class='fa-solid fa-star'></i>";
            
       }
       for (let j = 0; j < 5-roundstar; j++) {
            star[i].innerHTML+="<i class='fa-regular fa-star'></i>";
        }
        
    }
}
