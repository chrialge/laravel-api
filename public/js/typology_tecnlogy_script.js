function formUpdate(element, e) {
    const containerBtn = element.children[3]
    const btnConfirm = containerBtn.children[0]
    const btnLoading = containerBtn.children[1]

    btnConfirm.style.display = "none";
    btnLoading.style.display = "block";

    if (element.children[2].children[0].value.trim().length === 0) {
        e.preventDefault();
        btnConfirm.style.display = "";
        btnLoading.style.display = "";
    }
}

function formCreate(element, e) {
    const containerBtn = element.children[2]
    const btnConfirm = containerBtn.children[0]
    const btnLoading = containerBtn.children[1]

    btnConfirm.style.display = "none";
    btnLoading.style.display = "block";

    if (element.children[1].children[1].value.trim().length === 0) {
        e.preventDefault();
        btnConfirm.style.display = "";
        btnLoading.style.display = "";
    }
}