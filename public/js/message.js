const option = document.getElementById('option');
const btn = document.querySelector('.add');
const textarea = document.getElementById('input')

textarea.addEventListener('input', () =>{
    textarea.style.height = "auto"
    textarea.style.padding = "3px"
    textarea.style.height = textarea.scrollHeight + "px"
})

btn.addEventListener('click', () =>{
    option.classList.toggle('active')
});