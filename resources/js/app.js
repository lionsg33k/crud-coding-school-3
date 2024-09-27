import './bootstrap';


let myBtns = document.querySelectorAll(".edit")

myBtns.forEach(btn => {


    btn.addEventListener("click", (e) => {

        let parent = e.target.parentElement.parentElement.parentElement.parentElement
        let myInput = parent.firstElementChild



        myInput.removeAttribute("readonly")
        myInput.focus()
        let form = btn.nextElementSibling
        form.classList.remove("hidden")
        btn.classList.add('hidden')
        myInput.addEventListener("change", (ev) => {
            form.querySelector(".hiddenInput").value = ev.target.value
        })


    })


});

