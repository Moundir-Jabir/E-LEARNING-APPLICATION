let myModal = new bootstrap.Modal(document.getElementById('exampleModal2'), {
    keyboard: false
})
let modal = document.getElementById("exampleModal2")
if(modal.className.includes("block"))
    myModal.show()


let deleteModal = new bootstrap.Modal(document.getElementById('delete'), {
    keyboard: false
})
let modalD = document.getElementById("delete")
if(modalD.className.includes("block"))
    deleteModal.show()