const statuts=document.querySelector('#statuts');
const statut=document.querySelector('.statut');

const btn=document.querySelector('.button');
btn.addEventListener("click",()=>{
    statuts.value='confirmé';
    // statut.value='payé';
})
btn.addEventListener("click",()=>{
    statut.value='payé';
})



